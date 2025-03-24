<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return redirect()->back()->withErrors([
            'email' => 'The password or email field does not match.'
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('auth.login');
    }
    
    public function register()
    {
        return view('auth.register.index');
    }

    public function registerPost(RegisterRequest $request)
    {
        
        $user = new User($request->validated());
        $user->save();

        // renvoie la popupp de verification email
        // return $this->registerOTP();

        //welcome
        return $this->authWelcome();
    }

    public function resetPasswordSuccess()
    {
        return view('auth.pass.success');
    }

    public function forgotPassword()
    {
        return view('auth.pass.index');
    }

    public function forgotPasswordOTP()
    {
        return view('auth.pass.otp');
    }

    public function forgotPasswordSuccess()
    {
        return view('auth.pass.success');
    }

    public function updatePassword()
    {
        return view('auth.pass.update');
    }

    public function updatePasswordSuccess()
    {
        return view('auth.pass.success');
    }

    public function registerOTP()
    {
        return view('auth.register.otp');
    }

    public function authWelcome()
    {
        return view('auth.welcome');
    }

    public function registerOTPPost()
    {
        // triter les data

        // renvoyer vers account
        return $this->authWelcome();
    }

    public function forgotPasswordPost()
    {
        if (isset($_POST['submit_otp'])) {

            return $this->forgotPasswordOTPPost();

        }else{

            return $this->sendOTP();
        }
    }

    public function sendOTP()
    {
        // triter les data

        // renvoyer vers email verification
        return $this->forgotPasswordOTP();
    }

    public function forgotPasswordOTPPost()
    {
        // triter les data

        // renvoyer vers set new password
        return $this->updatePassword();
    }

    public function updatePasswordPost()
    {
        // triter les data

        // renvoyer vers login
        header("Location:/auth/pass/success");
        die;
    }

}
