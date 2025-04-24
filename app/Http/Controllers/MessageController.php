<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends NoticeController
{
    public function show(Request $request)
    {
        $posts = Chat::getChatsShow($request->input('id'));
        Message::makeView($posts);

        return view('shared.account.message.show', compact('posts'));
        
    }
    // public function show(Request $request)
    // {
    //     $chat = Chat::getChatsShow($request['id']);
        
    //     Message::makeView($chat);

    //     $contacts = User::getContactsForUser();

    //     $chats = (Auth::user())
    //         ->chats()
    //         ->with('invite','messages')
    //         ->orderByRaw('created_at Desc')
    //         ->get();

    //     return view('account.message.show', [
    //         "chats" => $chats,
    //         "contacts" => $contacts,
    //         "messages" => $chat,
    //         'parentId' => new idController()
    //     ]);
    // }

    public function send(Request $request)
    {
        $request->validate([
            "content" => ['required','string'],
            "recipient_id" => ['exists:users,id'],
            "chat_id" => ['exists:chats,id']
        ]);

        DB::table('messages')
            ->where('content', '=', NULL)
            ->delete();

        $message = new Message();
        $message->content = $request['content'];
        $message->recipient_id = $request['recipient_id'];
        $message->chat_id = $request['chat_id'];
        $message->sender_id = (Auth::user())->id;
        $message->save();

        $requstPost = Request::create('/message/show', 'POST', [
            'id' => $request['chat_id'],
        ]);

        return $this->show($requstPost);
    }

    public function delete($id)
    {
        return view('account.message.delete',[
            'id' => $id
        ]);
    }

    public function deletePost(Request $request)
    {    
        //traitement
        $message = Message::find($request['id']);
        $message->delete();

        $requstPost = Request::create('/message/show', 'POST', [
            'id' => $request['chat_id'],
        ]);
        
        return $this->show($requstPost);
    }
}
