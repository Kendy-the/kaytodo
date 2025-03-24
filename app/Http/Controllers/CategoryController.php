<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryCreateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index',[
            'posts' => (Auth::User())->categories()->get(),
            'post' => new Category()
        ]);
    }

    public function store(CategoryCreateRequest $request)
    {
        $credentials = $request->validated();
        $category = new Category();
        $category->name = $credentials['name'];
        $category->description = $credentials['description'];
        $category->user_id = (Auth::user())->id;
        $category->save();
        return redirect()->route('category.new.success');
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
