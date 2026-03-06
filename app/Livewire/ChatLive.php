<?php

namespace App\Livewire;

use App\Models\Chat;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatLive extends Component
{
    public $auth;
    public $email;
    public $chats;
    public $activeChat;
    public $selectedInvite;

    public function mount()
    {
        $this->auth = Auth::user();
        $this->chats = Chat::getChats();
        $this->selectedInvite = $this->chats->first()->invite;
        $this->activeChat = 0;
        // dd($this->chats);
    }

    public function selectInvite($id,$chat)
    {
        $this->selectedInvite = User::find($id);
        $this->activeChat = $chat;
    }

    public function storeContact()
    {
        if(!$this->email)
            return;
        dd($this->contactController);
        $this->contactController->store($this->email);
    }

    public function render()
    {
        return view('livewire.chat-live');
    }

}