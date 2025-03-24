<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function attendant()
    {
        return view('attendant');
    }

    public function profile()
    {
        return view('account.profile.index');
    }

    public function edit()
    {
        return view('account.profile.edit');
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
    
    public function updatePass()
    {
        //traitement

        return $this->passConfirm();
    }


    public function update()
    {
        //traitement

        return view('account.profile.otp');
    }

    public function editOtpPost()
    {
        //traitement

        return redirect()->route('account.profile');
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
