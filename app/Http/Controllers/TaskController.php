<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTaskRequest;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = (Auth::User())->tasks()->orderByRaw('created_at DESC')->get();
        $taskNumber = Task::taskNumber((Auth::User())->tasks()->get());
        $categories = (Auth::User())->categories()->get();
        $contacts = User::getContacts();

        return view('task.index',[
            'posts' => $tasks,
            'tasks' => $taskNumber,
            'categories' => $categories,
            'contacts' => $contacts,
            'post' => new Task(),
            'parentId' => new idController()
        ]);
    }

    public function store(CreateTaskRequest $request)
    {
        $credentials = $request->validated();
        $task = new Task();
        $task->name = $credentials['name'];
        $task->description = $credentials['description'];
        $task->end_at = $credentials['end_at'];
        $task->category_id = $credentials['category'];

        if(isset($credentials['project'])){
            $task->project_id = $credentials['project'];
        }

        $task->user_id = (Auth::user())->id;
        $task->save();

        if(isset($credentials['contacts'])){
            $task->contacts()->sync($credentials['contacts']);
        }
        
        return redirect()->route('task.new.success');
    }

    public function newSuccess()
    {
        return view('task.new.success');
    }

    public function update(Request $request)
    {
        $credentials = $request->all();
        $task = Task::find($credentials['id']);

        Validator::make($credentials, [
            'name' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:10'],
            'end_at' => ['required',Rule::date()->todayOrAfter()],
            'category' => [
                'required',
                'integer',
                Rule::exists('categories', 'id')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                })
            ],
            'contacts' => ['array', 
                'nullable', Rule::exists('contacts', 'id')->where(function ($query) {
                return $query->where('user_id', auth()->id());
            })],
            'project' => ['nullable','integer', Rule::exists('projects', 'id')->where(function ($query) {
                return $query->where('user_id', auth()->id());
            })],
        ]);

        $task->name = $credentials['name'];
        $task->description = $credentials['description'];
        $task->end_at = $credentials['end_at'];
        $task->category_id = $credentials['category'];

        if(isset($credentials['contacts'])){
            $task->contacts()->sync($credentials['contacts']);
        }

        if(isset($credentials['project'])){
            $task->project_id = $credentials['project'];
        }

        $task->user_id = (Auth::user())->id;
        $task->save();
        
        return redirect()->route('task.edit.success');
    }

    public function editSuccess()
    {
        return view('task.edit.success');
    }

    public function end(Request $request)
    {
        $credentials = $request->all();
        $task = Task::find($credentials['id']);

        $task->statut = env('DONE');
        $task->save();

        return redirect()->route('task.end.success');
    }

    public function endSuccess()
    {
        return view('task.end.success');
    }

    public function delete(Request $request)
    {
        $credentials = $request->all();
        $task = Task::find($credentials['id']);

        $task->delete();
        return redirect()->route('task.delete.success');
    }

    public function deleteSuccess()
    {
        return view('task.delete.success');
    }
}