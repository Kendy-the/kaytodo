<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index',[
            'postUp' => (new Project())->find(1),
            'post' => new Project(),
            'tasks' => ((new Project())->find(1))->tasks
        ]);
    }

    public function newSuccess()
    {
        return view('project.new.success');
    }

    public function editSuccess()
    {
        return view('project.edit.success');
    }

    public function endSuccess()
    {
        return view('project.end.success');
    }

    public function deleteSuccess()
    {
        return view('project.delete.success');
    }

    public function store()
    {
        //traitement

        return redirect()->route('project.new.success');
    }

    public function update()
    {
        //traitement
        return redirect()->route('project.edit.success');
    }

    public function end()
    {
        //traitement
        return redirect()->route('project.end.success');
    }

    public function delete()
    {
        //traitement
        return redirect()->route('project.delete.success');
    }
}
