<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index',[
            'postUp' => (new Category())->find(1),
            'post' => new Category(),
            'tasks' => ((new Category())->find(1))->tasks
        ]);
    }

    public function newSuccess()
    {
        return view('category.new.success');
    }

    public function editSuccess()
    {
        return view('category.edit.success');
    }

    public function endSuccess()
    {
        return view('category.end.success');
    }

    public function deleteSuccess()
    {
        return view('category.delete.success');
    }

    public function store()
    {
        //traitement

        return redirect()->route('category.new.success');
    }

    public function update()
    {
        //traitement
        return redirect()->route('category.edit.success');
    }

    public function end()
    {
        //traitement
        return redirect()->route('category.end.success');
    }

    public function delete()
    {
        //traitement
        return redirect()->route('category.delete.success');
    }
}
