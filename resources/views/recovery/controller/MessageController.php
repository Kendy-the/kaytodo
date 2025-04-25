<?php
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