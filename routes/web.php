<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttendantController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//Home - website

Route::prefix('/')->controller(HomeController::class)->group(function(){ 
    Route::get('/','welcome')->name('welcome');
    Route::get('/price','price')->name('price');
});

Route::prefix('/support')->name('support.')->controller(SupportController::class)->group(function(){ 
    Route::get('/contact','index')->name('contact');
    Route::post('/contact','store');
    Route::get('/success','success')->name('success');
    Route::get('/faq-and-help','faqAndhelp')->name('faq-help');
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
    
    Route::prefix('/project')->name('project.')->controller(ProjectController::class)->group(function(){
        Route::get('/','index')->name('.');
        Route::get('/all','index');
        Route::get('/{id}','index')->where([
            "id" => "[0-9]+",
        ]);

        Route::get('/new','index')->name('new');
        Route::post('/new','store');
        Route::get('/new/success','newSuccess')->name('new.success');
    
        Route::get('/pin','index')->name('pin');
        Route::post('/pin','pinPost');
        Route::get('/recently-add','index')->name('recently-add');
    
        Route::get('/edit','index')->name('edit');
        Route::post('/edit','update');
        Route::get('/edit/success','editSuccess')->name('edit.success');
    
        Route::get('/end','index')->name('end');
        Route::post('/end','end');
        Route::get('/end/success','endSuccess')->name('end.success');
    
        Route::get('/delete','index')->name('delete');
        Route::post('/delete','delete');
        Route::get('/delete/success','deleteSuccess')->name('delete.success');
    });
    
    Route::prefix('/category')->name('category.')->controller(CategoryController::class)->group(function(){
        Route::get('/','index')->name('.');
        Route::get('/all','index');
        Route::get('/{id}','index')->where([
            "id" => "[0-9]+",
        ]);

        Route::get('/new','index')->name('new');
        Route::post('/new','store');
        Route::get('/new/success','newSuccess')->name('new.success');
    
        Route::get('/pin','index')->name('pin');
        Route::post('/pin','pinPost');
        Route::get('/recently-add','index')->name('recently-add');
    
        Route::get('/edit','index')->name('edit');
        Route::post('/edit','update');
        Route::get('/edit/success','editSuccess')->name('edit.success');
    
        Route::get('/end','index')->name('end');
        Route::post('/end','end');
        Route::get('/end/success','endSuccess')->name('end.success');
    
        Route::get('/delete','index')->name('delete');
        Route::post('/delete','delete');
        Route::get('/delete/success','deleteSuccess')->name('delete.success');
    });
    
    Route::prefix('/task')->name('task.')->controller(TaskController::class)->group(function(){
        Route::get('/','index')->name('.');
        Route::get('/all','index');
        Route::get('/{id}','index')->where([
            "id" => "[0-9]+",
        ]);
        Route::get('/new','index')->name('new');
        Route::post('/new','store');
        Route::get('/new/success','newSuccess')->name('new.success');
    
        Route::get('/finish','index')->name('finish');
        Route::get('/in-progress','index')->name('in-progress');
    
        Route::get('/edit','index')->name('edit');
        Route::post('/edit','update');
        Route::get('/edit/success','editSuccess')->name('edit.success');
    
        Route::post('/end','end');
        Route::get('/end/success','endSuccess')->name('end.success');
    
        Route::get('/delete','index')->name('delete');
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
       
        Route::get('/notification','notification')->name('notification');
    });

    Route::prefix('/account')->name('account.')->controller(MessageController::class)->group(function(){
        Route::get('/message','index')->name('message');
        Route::get('/message/back/load', 'index');
        Route::post('/message/back/load', 'backLoad');
        Route::get('/message/show','index');
        Route::get('/message/load','index');
        Route::post('/message/show','show');
        Route::post('/message/load','load');
        Route::get('/message/delete','delete');
        Route::post('/message/delete','deletePost');
        Route::get('/message/send','index');
        Route::post('/message/send','send');
    });

    Route::prefix('/account')->name('account.')->controller(ContactController::class)->group(function(){
        Route::get('/contact/new','index');
        Route::post('/contact/new','store');
        
        Route::post('/contact/delete','deletePost');
        Route::get('/contact/delete','index');
    });

    Route::prefix('/account')->name('account.')->controller(ChatController::class)->group(function(){
        Route::get('/chat/new','index');
        Route::post('/chat/new','store');
        
        Route::post('/chat/delete','deletePost');
        Route::get('/chat/delete','index');
    });
});