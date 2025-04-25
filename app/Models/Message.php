<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public static function notView($messages)
    {
        $notView = 0 ;

        foreach($messages as $message)
        {
            if(!$message->view && ($message->sender_id != (Auth::user())->id))
            {
                $notView++;
            }
        }

        if($notView == 0)
        {
            return false;
        }
        return $notView;
    }

    public static function makeView($posts, $mes = true)
    {
        if($mes)
        {
            foreach ($posts as $message) {
                self::mkView($message);
            }
        }else{
            foreach ($posts->messages as $message) {
                self::mkView($message);
            }
        }

    }

    public static function mkView($message)
    {
        if(!$message->view && ($message->sender_id != (Auth::user())->id))
        {
            $message->view = env("VIEW");
            $message->save();
        }
    }

    public static function getRecent($chat_id)
    {
        return Message::where('chat_id',$chat_id)
            ->where('view',false)
            ->get();
    }

    public function getHour()
    {
        $today = Carbon::today();
        $date = Carbon::parse($this->created_at);

        if($date->lessThan($today))
        {
            return $date->format("d/m/y");
        }
        
        return $date->format("h:i");
    }

    public function getContent()
    {
        return Str::substr($this->content,0,15) . '...';
    }

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }
    
    public function recipient()
    {
        return $this->belongsTo(User::class,'recipient_id');
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
