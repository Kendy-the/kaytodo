<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class attendantController extends Controller
{
    public function index()
    {
        return view('attendant.index');
    }

    public function store()
    {
        //traitement

        return redirect()->route('attendant..');
    }
}
