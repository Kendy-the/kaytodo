<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends NoticeController
{   
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required','email']
        ]);

        $contact = new Contact();
        $contact->email = $request['email'];
        $contact->user_id = (Auth::user())->id;
        $contact->save();
        
        return redirect()
            ->route('account.message');
    }
    
    public function deletePost(Request $request)
    {
        $user = User::find($request['id']);
        $contact = (Auth::user())
            ->contacts()
            ->where('email','=',$user->email)
            ->get();
        $contact[0]->delete();

        return redirect()
            ->route('account.message');
    }

}
