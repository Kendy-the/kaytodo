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
        Message::makeView($posts[0],false);
        $contacts = User::getContactsForUser();

        return view('shared.account.message.show', compact('posts'), compact('contacts'));
        
    }

    public function load(Request $request)
    {
        $recents = Message::getRecent($request->input('id'));
        Message::makeView($recents);
        return view('shared.account.message.recent', compact('recents'));
    }

    public function send(Request $request)
    {
        dd($request->all());
        $request->validate([
            "content" => ['required','string'],
            "recipient_id" => ['exists:users,id'],
            "chat_id" => ['exists:chats,id']
        ]);

        DB::table('messages')
            ->where('content', NULL)
            ->delete();

        $message = new Message();
        $message->content = $request['content'];
        $message->recipient_id = $request['recipient_id'];
        $message->chat_id = $request['chat_id'];
        $message->sender_id = (Auth::user())->id;
        $message->save();

        $requstPost = Request::create('/account/message/show', 'POST', [
            'id' => $request['chat_id'],
        ]);

        return response()->json(['status' => 'success']);
        // return $this->show($requstPost);
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

        $requstPost = Request::create('/account/message/load', 'POST', [
            'id' => $request['chat_id'],
        ]);
        
        return $this->load($requstPost);
    }
}
