<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    protected $fillable = [
        'name',
        'description',
        'end_at',
        'category_id',
        'project_id'
    ];


    public static function taskNumber($tasks)
    {
        $toDo = [];
        $progress = [];
        $done = [];

        foreach($tasks as $task)
        {
            switch($task->statut)
            {
                case 0 :
                case 1 :
                    array_push($toDo, $task);
                    array_push($progress, $task);
                    break;
                case 2 :
                    array_push($done, $task);
                    break;
            }
        }
    
        $newTasks ['todo'] = array_reverse($toDo);
        $newTasks ['progress'] = array_reverse($progress);
        $newTasks ['done'] = array_reverse($done);
        $newTasks ['donePercent'] = round((count($done) * 100 / ($tasks->count() > 0 ? $tasks->count() : 1)), 0);

        return $newTasks;
    }

    public function getDone()
    {

    }

    public function getProgress()
    {

    }

    public function getStatut()
    {
        switch ($this->statut)
        {
            case 0 :
            case 1 : return "In Progress";
            case 2 : return "done";
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

}