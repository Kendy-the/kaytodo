<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;

//Home - website

Route::prefix('/')->controller(HomeController::class)->group(function(){ 
    Route::get('/','welcome')->name('welcome');
    Route::get('/price','price')->name('price');
    Route::get('/about-team','aboutAndTeam')->name('about-team');
    Route::get('/faq-and-help','faqAndhelp')->name('faq-help');
    Route::post('/contact','contact')->name('contact');
});

Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function(){ 
    Route::get('/welcome','welcome')->name('welcome');
    Route::get('/logout','logout')->name('logout');

    Route::get('/login','login')->name('login');
    Route::post('/login','loginPost');

    Route::get('/register','register')->name('register');
    Route::post('/register','registerPost');

    Route::get('/register/otp','registerOTP')->name('register.otp');
    Route::post('/register/otp','registerOTPPost');

    Route::get('/pass','forgotPassword')->name('forgot.password');
    Route::post('/pass','forgotPasswordPost');

    Route::get('/pass/success','forgotPasswordSuccess')->name('forgot.password.success');

    Route::get('/pass/otp','forgotPasswordOTP')->name('forgot.password.otp');
    Route::post('/pass/otp','forgotPasswordOTPPost');
    Route::post('/pass/update','updatePasswordPost');

});

Route::middleware(['auth'])->group(function () {
    Route::prefix('/')->controller(UserController::class)->group(function(){
        Route::get('/home','home')->name('home');
    });
    
    Route::prefix('/attendant')->name('attendant.')->controller(AttendantController::class)->group(function(){
        Route::get('/','index')->name('.');
        Route::post('/new','store');
    });
    
    Route::prefix('/project')->name('project.')->controller(ProjectController::class)->group(function(){
        Route::get('/','index');
        Route::post('/new','store');
        Route::get('/new/success','newSuccess')->name('new.success');
    
        Route::get('/pin','pin')->name('pin');
        Route::get('/recently-add','recentlyAdd')->name('recently-add');
    
        Route::post('/edit','update');
        Route::get('/edit/success','editSuccess')->name('edit.success');
    
        Route::post('/end','end');
        Route::get('/end/success','endSuccess')->name('end.success');
    
        Route::post('/delete','delete');
        Route::get('/delete/success','deleteSuccess')->name('delete.success');
    });
    
    Route::prefix('/category')->name('category.')->controller(CategoryController::class)->group(function(){
        Route::get('/','index');
        Route::post('/new','store');
        Route::get('/new/success','newSuccess')->name('new.success');
    
        Route::get('/pin','pin')->name('pin');
        Route::get('/recently-add','recentlyAdd')->name('recently-add');
    
        Route::post('/edit','update');
        Route::get('/edit/success','editSuccess')->name('edit.success');
    
        Route::post('/end','end');
        Route::get('/end/success','endSuccess')->name('end.success');
    
        Route::post('/delete','delete');
        Route::get('/delete/success','deleteSuccess')->name('delete.success');
    });
    
    Route::prefix('/task')->name('task.')->controller(TaskController::class)->group(function(){
        Route::get('/','index');
        Route::post('/new','store');
        Route::get('/new/success','newSuccess')->name('new.success');
    
        Route::get('/end','finish')->name('finish');
        Route::get('/inProgress','in-progress')->name('in-progress');
    
        Route::post('/edit','update');
        Route::get('/edit/success','editSuccess')->name('edit.success');
    
        Route::post('/end','end');
        Route::get('/end/success','endSuccess')->name('end.success');
    
        Route::post('/delete','delete');
        Route::get('/delete/success','deleteSuccess')->name('delete.success');
    });
    
    Route::prefix('/account')->name('account.')->controller(UserController::class)->group(function(){
        Route::post('/search','search')->name('search');
    
        Route::get('/profile','profile')->name('profile');
        Route::get('/profile/edit','edit')->name('edit');
        Route::post('/profile/edit','update');
    
        Route::get('/profile/edit/otp','editOtp')->name('profile.edit.otp');
        Route::post('/profile/edit/otp','editOtpPost');
    
        Route::get('/profile/pass/edit','editPass')->name('profile.pass.edit');;
        Route::post('/profile/pass/edit','updatePass');
    
        Route::get('/profile/pass/confirm','passConfirm')->name('profile.pass.confirm');;
        Route::post('/profile/pass/confirm','passConfirmPost');
    
        Route::get('/profile/pass/otp','passOtp')->name('profile.pass.otp');;
        Route::post('/profile/pass/otp','passOtpPost');
    
        Route::get('/profile/pass/success','passSuccess')->name('profile.pass.success');;
    
        Route::get('/message','message')->name('message');
        Route::get('/message/show/{id}','showMessage')->name('message.show');
        Route::get('/message/delete/{id}','deleteMessage')->where([
            "id" => "[0-9]+"
        ])->name('message.delete');
        Route::post('/message/delete','deleteMessagePost');
        Route::post('/message/send','sendMessage')->name('message.send');
    
        Route::get('/notification','notification')->name('notification');
        Route::get('/about','about')->name('about');
        Route::get('/faq-and-help','faqAndHelp')->name('faq-and-help');
    });
});