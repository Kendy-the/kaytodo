<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    const PROGRESS = 0;
    const PENDING = 1;
    const DONE = 2;
    // const VIEW = 1;

    protected $fillable = [
        'name',
        'description',
        'end_at',
        'category_id',
        'project_id'
    ];


    /**
     * Get the number of tasks in progress and done, and the percentage of done tasks.
     *
     * @param mixed $tasks
     *
     * @return array
     *
     */
    public static function taskNumber($tasks) : array
    {
        $progress = self::getProgress($tasks);
        $pending = self::getPending($tasks);
        $done = self::getDone($tasks);

        $newTasks ['progress'] = array_reverse($progress);
        $newTasks['pending'] = array_reverse($pending);
        $newTasks ['done'] = array_reverse($done);
        $newTasks ['donePercent'] = round((count($done) * 100 / ($tasks->count() > 0 ? $tasks->count() : 1)), 0);

        return $newTasks;
    }

    public static function getTodayTask($tasks) : array
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
            if($task->statut === self::DONE)
            {
                array_push($done, $task);
            }
        }

        return $done;
    }

    public static function getPending($tasks)
    {
        $pending = [];

        foreach($tasks as $task)
        {
            if($task->statut === self::PENDING)
            {
                array_push($pending, $task);
            }
        }

        return $pending;
    }

    public static function getProgress($tasks)
    {
        $progress = [];

        foreach($tasks as $task)
        {
            if($task->statut === self::PROGRESS)
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
        if($this->statut !== self::PENDING && $this->statut !== self::DONE)
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

            $this->statut = self::PENDING;
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
            case self::PENDING : return "Pending";
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
