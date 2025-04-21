<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends NoticeController
{   
    public function store(Request $request)
    {
        $user_id = (Auth::user())->id;

        $request->validate([
            'invite_id' => ['unique:chats,invite_id']
        ]);
        $chat = new Chat();
        $chat->invite_id = $request['invite_id'];
        $chat->user_id = $user_id;
        $chat->save();

        $message = new Message();
        $message->sender_id = $user_id;
        $message->recipient_id = $request['invite_id'];
        $message->chat_id = $chat->id;
        $message->view = true;
        $message->save();
        
        return redirect()
            ->route('account.message');
    }
    
    public function deletePost(Request $request)
    {

        $chat = Chat::find($request['chat_id']);
        $chat->delete();

        return redirect()
            ->route('account.message');
    }
}
