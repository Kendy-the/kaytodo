<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'pin',
        'user_id'
    ];

    public static function recent($categories)
    {

        $week = 1;
        $date = Carbon::today()->subWeek($week);
        $recents = [];

        foreach($categories as $category)
        {
            $categoryDate = Carbon::parse($category->created_at);
            if(!$categoryDate->lessThan($date))
            {
                array_push($recents,$category);
            }
        }   

        return $recents;
    }

    public static function pin($categories)
    {
        $pins = [];

        foreach($categories as $category)
        {
            if($category->pin)
            {
                array_push($pins,$category);
            }
        }

        return $pins;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
