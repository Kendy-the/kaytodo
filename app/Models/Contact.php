<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
    
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    
    public function meetings()
    {
        return $this->belongsToMany(Meeting::class);
    }
}