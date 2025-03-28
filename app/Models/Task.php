<?php

namespace App\Models;

use Illuminate\Support\Carbon;
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
        $progress = self::getProgress($tasks);
        $done = self::getDone($tasks);
    
        $newTasks ['progress'] = array_reverse($progress);
        $newTasks ['done'] = array_reverse($done);
        $newTasks ['donePercent'] = round((count($done) * 100 / ($tasks->count() > 0 ? $tasks->count() : 1)), 0);

        return $newTasks;
    }

    public static function getDone($tasks)
    {
        $done = [];

        foreach($tasks as $task)
        {
            if($task->statut == env("TASK_DONE"))
            {
                array_push($done, $task);
            }
        }

        return $done;
    }

    public static function getProgress($tasks)
    {
        $progress = [];

        foreach($tasks as $task)
        {
            if($task->statut == env("TASK_PROGRESS"))
            {
                array_push($progress, $task);
            }
        }

        return $progress;
    }

    public function getProgression()
    {
        if($this->statut != env("TASK_DONE"))
        {
            $today = Carbon::now();

            $createDate = Carbon::parse($this->created_at);
            $endDate = Carbon::parse($this->end_at);

            $hours = $createDate->diffInHours($endDate);
            $interval = $today->diffInHours($endDate);
            $interval = $hours - $interval;

            $percent = intval(round((($interval * 100) / ($hours > 0 ? $hours : 1)), 0));

            if($percent <= 100)
            {
                return $percent;
            }

            $this->statut = env("TASK_DONE");
            $this->save();
        }
        return 100;
    }

    public function getStatut()
    {
        switch ($this->statut)
        {
            case env("TASK_PROGRESS") : return "In Progress";
            case env("TASK_DONE") : return "done";
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