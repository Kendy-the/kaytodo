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

    /**
     * Store a newly created task.
     *
     * @param CreateTaskRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(CreateTaskRequest $request) : \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validated();

        if($response = self::checkErrorInCategoryOrProject($credentials)){
            return $response;
        }

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

    /**
     * test if the task name already exists in the category for the user
     *
     * @param int $category
     * @param string $taskName
     *
     * @return bool
     *
     */
    private static function inCategory(int $category, string $taskName) : bool{

        /**
         * @var Illuminate\Database\Eloquent\Collection
         */
        $task = (Auth::User())
            ->tasks()
            ->where('name', $taskName)
            ->where('category_id', $category)
            ->get();

        return empty($task[0]) ? false : true;
    }

    /**
     * test if the task name already exists in the project for the user
     *
     * @param int $project
     * @param string $taskName
     *
     * @return bool
     *
     */
    private static function inProject(int $project, string $taskName) : bool{

        /**
         * @var Illuminate\Database\Eloquent\Collection
         */
        $task = (Auth::User())
            ->tasks()
            ->where('name', $taskName)
            ->where('project_id', $project)
            ->get();

        return empty($task[0]) ? false : true;
    }

    /**
     * test if the task end date is outside the project end date for the user
     *
     * @param int $project
     * @param string $end_at
     *
     * @return bool
     *
     */
    private static function outDateOfProject(int $project, string $end_at) : bool{

        /**
         * @var Illuminate\Database\Eloquent\Collection
         */
        $project = (Auth::User())
            ->projects()
            ->where('id', $project)
            ->get();

        return $end_at >= $project[0]->end_at ? true : false;
    }

    /**
     * check if the task name already exists in the category or project for the user and return an error if it does
     *
     * @param array $credentials
     *
     * @return false|\Illuminate\Http\RedirectResponse
     *
     */
    private static function checkErrorInCategoryOrProject(array $credentials) : false|\Illuminate\Http\RedirectResponse{

        if(isset($credentials['project'])){

            if(self::inProject($credentials['project'], $credentials['name'])){

                return redirect()->back()->withErrors(
                    ['name' => 'You already have a task with this name in this project.']
                )->withInput([
                    'name' => $credentials['name'],
                    'description' => $credentials['description'],
                    'end_at' => $credentials['end_at'],
                    'contacts' => $credentials['contacts'] ?? [],
                    'project' => $credentials['project'] ?? null,
                    'itemId' => $credentials['itemId'],
                ]);
            }

            if(self::outDateOfProject($credentials['project'], $credentials['end_at'])){

                return redirect()->back()->withErrors(
                    ['end_at' => 'The end date of the task must be before the end date of the project.']
                )->withInput([
                    'name' => $credentials['name'],
                    'description' => $credentials['description'],
                    'end_at' => $credentials['end_at'],
                    'contacts' => $credentials['contacts'] ?? [],
                    'project' => $credentials['project'] ?? null,
                    'itemId' => $credentials['itemId'],
                ]);
            }

        }else{

            if(self::inCategory($credentials['category'], $credentials['name'])){
                return redirect()->back()->withErrors(
                    ['name' => 'You already have a task with this name in this category.']
                )->withInput([
                    'name' => $credentials['name'],
                    'description' => $credentials['description'],
                    'end_at' => $credentials['end_at'],
                    'category' => $credentials['category'],
                    'contacts' => $credentials['contacts'] ?? [],
                    'project' => $credentials['project'] ?? null,
                    'itemId' => $credentials['itemId'],
                ]);
            }
        }

        return false;
    }

    public function newSuccess()
    {
        return view('task.new.success');
    }

    /**
     * Update the specified task.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function update(Request $request) : \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();

        $credentials = self::validateTaskData($data);
        $task = Task::find($credentials['id']);

        if($task->statut === Task::PENDING){
            if($task->end_at <= $credentials['end_at']){
                $task->statut = Task::PROGRESS;
            }
        }

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

    /**
     * validate the task data for update
     *
     * @param array $data
     *
     * @return array
     *
     */
    public static function validateTaskData(array $data) : array
    {
        $validator = Validator::make($data,[
            'id' => 'integer',
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

        return $validator->validated();
    }

    public function editSuccess()
    {
        return view('task.edit.success');
    }

    /**
     * End the specified task.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function end(Request $request) : \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->all();
        $task = Task::find($credentials['id']);

        $task->statut = TASK::DONE;
        $task->save();

        return redirect()->route('task.end.success');
    }

    public function endSuccess()
    {
        return view('task.end.success');
    }

    /**
     * Delete the specified task.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function delete(Request $request) : \Illuminate\Http\RedirectResponse
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
