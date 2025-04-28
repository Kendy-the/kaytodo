<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $contacts = User::getContactsForUser();
        $chats = Chat::getChats();

        return view('account.message.index',[
            "contacts" => $contacts,
            "chats" => $chats,
            'parentId' => new idController()
        ]);
    }

    public function backLoad()
    {
        $contacts = User::getContactsForUser();
        $chats = Chat::getChats();
        return view('shared.account.message.index',[
            "contacts" => $contacts,
            "posts" => $chats,
            'parentId' => new idController()
        ]);
    }
}