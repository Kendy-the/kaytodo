<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function home()
    {
        $recent = Task::recent((Auth::User())->tasks()->orderByRaw('created_at DESC')->get());
        return view('home',[
            'posts' => $recent
        ]);
    }

    public function attendant()
    {
        return view('attendant');
    }

    public function profile()
    {
        return view('account.profile.index',[
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('account.profile.edit',[
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $credentials = $request->all();
        $user = User::find($credentials['id']);
 
        $user->profession = $credentials['profession'];
        $user->country = $credentials['country'];
        $user->city = $credentials['city'];
        $user->state = $credentials['state'];
        $user->other = $credentials['other'];
        
        $user->save();

        return redirect()->route('account.profile');
    }

    public function editPass()
    {
        return view('account.pass.edit');
    }

    public function passConfirm()
    {
        return view('account.pass.confirm-update');
    }

    public function passOtp()
    {
        return view('account.pass.otp');
    }

    public function passOtpPost()
    {
        //traitement

        return redirect()->route('account.profile.pass.success');
    }

    public function passSuccess()
    {
        return view('account.pass.success');
    }

    public function passConfirmPost()
    {
        //traitement

        return $this->passOtp();
    }
    
    public function updatePass(PasswordRequest $request)
    {
        $credendials = $request->validated();
        $user = Auth::user();

        if (Hash::check($credendials['current_password'], $user->password)) {
            $user->password = Hash::make($credendials['password']);
            $user->save();
            return redirect()->route('account.profile');
        }

        return redirect()->back()->withErrors([
            'current_password' => 'The password field does not match.'
        ])->onlyInput('current_password');

    }


    public function editOtpPost(Request $request)
    {
        // dd($request->all());
        // $credentials = $request->all();
        // $user = User::find($credentials['id']);
 
        // $user->profession = $credentials['profession'];
        // $user->country = $credentials['country'];
        // $user->city = $credentials['city'];
        // $user->state = $credentials['state'];
        // $user->other = $credentials['other'];
        
        // $user->save();

        // return redirect()->route('account.profile');
    }

    public function notification()
    {
        return view('account.notification');
    }

    public function message()
    {
        return view('account.message.index');
    }

    public function showMessage()
    {
        return view('account.message.show');
    }

    public function sendMessage()
    {
        //traitement
        $reciepientId = 1;
        return redirect()->route('account.message.show',$reciepientIid);
    }

    public function deleteMessage($id)
    {
        return view('account.message.delete',[
            'id' => $id
        ]);
    }

    public function deleteMessagePost()
    {    
        //traitement
        return redirect()->route('account.message.show',2);
    }

    public function search()
    {
        //
        return redirect()->route('account.profile');
    }

    public function faqAndHelp()
    {
        return view('account.faq-and-help');
    }

    public function about()
    {
        return view('account.about-team');
    }
}
