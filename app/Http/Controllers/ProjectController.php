<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProjectCreateRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = (Auth::User())->projects()->orderByRaw('created_at DESC')->get();
        // $projects = (Auth::User())->projects()->with('tasks')->orderByRaw('created_at DESC')->get();

        // $categories = (Auth::User())->categories()->with('tasks')->get();

        $categories = (Auth::User())->categories()->get();
        $recents = Project::recent($projects);
        $pins = Project::pin($projects);
        $project = Project::projectNumber((Auth::User())->projects()->get());
        $contacts = User::getContacts();
    
        return view('project.index',[
            'posts' => $projects,
            'recents' => $recents,
            'pins' => $pins,
            'projects' => $project,
            'categories' => $categories,
            'contacts' => $contacts,
            'post' => new Project(),
            'parentId' => new idController()
        ]);
    }

    public static function setData($object,$data)
    {
        $object->name = $data['name'];
        $object->description = $data['description'];
        $object->end_at = $data['end_at'];
        $object->category_id = $data['category'];
        $object->user_id = (Auth::user())->id;
    }
    public function store(ProjectCreateRequest $request)
    {
        $credentials = $request->validated();
        $project = new Project();

        self::setData($project,$credentials);
        $project->save();

        if(isset($credentials['contacts'])){
            $project->contacts()->sync($credentials['contacts']);
        }

        return redirect()->route('project.new.success');
    }

    public function newSuccess()
    {
        return view('project.new.success');
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $preCredentials = Validator::make($data, [
            'id' => 'integer',
            'name' => ['required','string', 'min:3'],
            'description' => ['required', 'string', 'min:10'],
            'end_at' => ['required',Rule::date()->todayOrAfter()],
            'category' => [
                'required',
                'integer',
                Rule::exists('categories', 'id')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                })
            ],
            'contacts' => [
                'array', 
                'nullable', Rule::exists('contacts', 'id')->where(function ($query) {
                return $query->where('user_id', auth()->id());
            })],
        ]);

        $credentials = $preCredentials->validate();

        $project = Project::find($credentials['id']);
        self::setData($project,$credentials);
        $project->save();

        if(isset($credentials['contacts'])){
            $project->contacts()->sync($credentials['contacts']);
        }

        return redirect()->route('project.edit.success');
    }

    public function editSuccess()
    {
        return view('project.edit.success');
    }

    public function end(Request $request)
    {
        $credentials = $request->all();
        $project = Project::find($credentials['id']);

        $project->statut = Project::DONE;
        $project->save();

        return redirect()->route('project.end.success');
    }

    public function endSuccess()
    {
        return view('project.end.success');
    }

    public function pinPost(Request $request)
    {
        $project = Project::find($request['id']);
        $project->pin ? $project->pin = false : $project->pin = true;
        $project->save();
        return redirect()->route('project.pin');
    }

    public function delete(Request $request)
    {
        $credentials = $request->all();
        $project = Project::find($credentials['id']);

        $project->delete();
        return redirect()->route('project.delete.success');
    }

    public function deleteSuccess()
    {
        return view('project.delete.success');
    }
}