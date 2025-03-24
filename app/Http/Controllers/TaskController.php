<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('task.index',[
            'postUp' => (new Task())->find(1),
            'post' => new Task()

        ]);
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

    public function store()
    {
        //traitement

        return redirect()->route('task.new.success');
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
