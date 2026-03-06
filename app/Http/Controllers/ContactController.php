<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends NoticeController
{   
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'email' => ['required','email']
    //     ]);

    //     $contact = new Contact();
    //     $contact->email = $request['email'];
    //     $contact->user_id = (Auth::user())->id;
    //     $contact->save();
        
    //     return redirect()
    //         ->route('account.message');
    // }
  
    public function store($email)
    {
        // valider les emails
        $credentials['email'] = $email;
        $credentials->validate([
            'email' => ['required','email']
        ]);

        dd($credentials);

        $user = (Auth::user())->id;
        $invite = User::where('email',$email)
            ->get();

        //save contactx`
        $contact = new Contact();
        $contact->email = $email;
        $contact->user_id = $user;
        $contact->save();

        //create chat for contact
        $chat = new Chat();
        $chat->user_id = $user;
        $chat->invite_id = $invite->id;
        
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
