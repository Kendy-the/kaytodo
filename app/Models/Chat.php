<?php

namespace App\Models;

use App\Models\Chat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public static function getChats()
    {
        $user = (Auth::user())->id;
    
        // return Chat::orWhere('invite_id',$user)
        //     ->orWhere('user_id',$user)
        //     ->with('invite','user','messages')
        //     ->get();
    
        return Chat::Where('user_id',$user)
            // ->orWhere('user_id',$user)
            ->with('invite','user','messages')
            ->get();
    }

    public static function getChatsShow($chat_id)
    {
        $user = (Auth::user())->id;
        return Chat::where('chats.id',$chat_id)
            ->with('invite','user','messages')
            ->orderByRaw('created_at Desc')
            ->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invite()
    {
        return $this->belongsTo(User::class,'invite_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
