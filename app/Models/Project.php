<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'pin',
        'end_at',
        'category_id'
    ];

    public static function projectNumber($projects)
    {
        $progress = self::getProgress($projects);
        $done = self::getDone($projects);
    
        $newProjects ['progress'] = array_reverse($progress);
        $newProjects ['done'] = array_reverse($done);
        $newProjects ['donePercent'] = round((count($done) * 100 / ($projects->count() > 0 ? $projects->count() : 1)), 0);

        return $newProjects;
    }

    public static function getDone($projects)
    {
        $done = [];

        foreach($projects as $project)
        {
            if($project->statut == env("DONE"))
            {
                array_push($done, $project);
            }
        }

        return $done;
    }

    public static function getProgress($projects)
    {
        $progress = [];

        foreach($projects as $project)
        {
            if($project->statut == env("PROGRESS"))
            {
                array_push($progress, $project);
            }
        }

        return $progress;
    }

    public static function recent($projects)
    {

        $week = 1;
        $date = Carbon::today()->subWeek($week);
        $recents = [];

        foreach($projects as $project)
        {
            $projectDate = Carbon::parse($project->created_at);
            if(!$projectDate->lessThan($date))
            {
                array_push($recents,$project);
            }
        }   

        return $recents;
    }

    public static function pin($projects)
    {
        $pins = [];

        foreach($projects as $project)
        {
            if($project->pin)
            {
                array_push($pins,$project);
            }
        }

        return $pins;
    }

    public function getStatut()
    {
        switch ($this->statut)
        {
            case env("PROGRESS") : return "In Progress";
            case env("DONE") : return "done";
        }
    }

    public function getProgression()
    {
        if($this->statut != env("DONE"))
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

            $this->statut = env("DONE");
            $this->save();
        }
        return 100;
    }

    public function getContacts()
    {
        return $this->contacts;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }
}