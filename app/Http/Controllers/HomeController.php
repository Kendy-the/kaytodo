<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function welcome()
    {
        return view('welcome');
    }
    
    public function price()
    {
        return view('price');
    }
    
    public function faqAndHelp()
    {
        return view('faq-and-help');
    }

}