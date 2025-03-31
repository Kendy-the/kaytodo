<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}