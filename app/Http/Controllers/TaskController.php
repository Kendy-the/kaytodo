<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = (Auth::User())->tasks()->orderByRaw('created_at DESC')->get();
        $taskNumber = Task::taskNumber((Auth::User())->tasks()->get());
        $categories = (Auth::User())->categories()->get();

        return view('task.index',[
            'posts' => $tasks,
            'tasks' => $taskNumber,
            'categories' => $categories,
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
        // participant - traitement
        $task->user_id = (Auth::user())->id;
        $task->save();
        return redirect()->route('task.new.success');
    }

    public function newSuccess()
    {
        return view('task.new.success');
    }

    public function editSuccess()
    {
        return view('task.edit.success');
    }

    public function endSuccess()
    {
        return view('task.end.success');
    }

    public function deleteSuccess()
    {
        return view('task.delete.success');
    }

    public function update()
    {
        //traitement
        return redirect()->route('task.edit.success');
    }

    public function end()
    {
        //traitement
        return redirect()->route('task.end.success');
    }

    public function delete()
    {
        //traitement
        return redirect()->route('task.delete.success');
    }
}
