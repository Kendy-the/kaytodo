<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = (Auth::User())->categories()->orderByRaw('created_at DESC')->get();
        $recents = Category::recent($categories);
        $pins = Category::pin($categories);
        $tasks = Task::taskNumber((Auth::User())->tasks()->get());

        return view('category.index', [
            'posts' => $categories,
            'recents' => $recents,
            'pins' => $pins,
            'tasks' => $tasks,
            'post' => new Category(),
            'parentId' => new idController()
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

    public function update(Request $request)
    {
        $data = $request->all();

        $preCredentials = Validator::make($data, [
            'id' => 'integer',
            'name' => ['required', Rule::unique('categories')->where(function ($query) {
                return $query->where('user_id', auth()->id());
            })->ignore($data['id']), 
            'string', 'min:3'],
            'description' => ['required', 'string', 'min:10']
        ]);
        $credentials = $preCredentials->validate();

        $category = Category::find($credentials['id']);
        $category->description = $credentials['description'];
        $category->save();

        return redirect()->route('category.edit.success');
    }

    public function editSuccess()
    {
        return view('category.edit.success');
    }

    public function pinPost(Request $request)
    {
        $category = Category::find($request['id']);
        $category->pin ? $category->pin = false : $category->pin = true;
        $category->save();
        return redirect()->route('category.pin');
    }

    public function delete(Request $request)
    {
        $credentials = $request->all();
        $category = Category::find($request['id']);
        $tasks = $category->tasks ?? $category->tasks;

        foreach($tasks as $task)
        {
            $task->delete();
        }
        $category->delete();

        return redirect()->route('category.delete.success');
    }

    public function deleteSuccess()
    {
        return view('category.delete.success');
    }

}