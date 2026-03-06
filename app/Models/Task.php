<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    const PROGRESS = 0;
    const DONE = 1;
    const VIEW = 1;

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

    public static function getTodayTask($tasks)
    {
        $date = Carbon::today();
        $today = [];

        foreach($tasks as $task)
        {
            $categoryDate = Carbon::parse($task->end_at);
            if($categoryDate->equalTo($date))
            {
                array_push($today,$task);
            }
        }   

        return $today;
    }

    public static function recent($tasks)
    {

        $week = 1;
        $date = Carbon::today()->subWeek($week);
        $recents = [];

        foreach($tasks as $task)
        {
            $categoryDate = Carbon::parse($task->created_at);
            if(!$categoryDate->lessThan($date))
            {
                array_push($recents,$task);
            }
        }   

        return $recents;
    }

    public static function getDone($tasks)
    {
        $done = [];

        foreach($tasks as $task)
        {
            if($task->statut == self::DONE)
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
            if($task->statut == self::PROGRESS)
            {
                array_push($progress, $task);
            }
        }

        return $progress;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    public function getProgression()
    {
        if($this->statut != self::DONE)
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

            $this->statut = self::DONE;
            $this->save();
        }
        return 100;
    }

    public function getStatut()
    {
        switch ($this->statut)
        {
            case self::PROGRESS : return "In Progress";
            case self::DONE : return "done";
        }
    }

    public function getCategory()
    {
        if(isset($this->category_id))
        return (Category::find($this->category_id))->name;
    }

    public function getProject()
    {
        if(isset($this->project_id))
        return (Project::find($this->project_id))->name;
    }

    public function getDate()
    {
        $createDate = Carbon::parse($this->created_at);
        $endDate = Carbon::parse($this->end_at);

        return $createDate->format('d/m/y') . " - " . $endDate->format('d/m/y');

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