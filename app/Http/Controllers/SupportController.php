<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Requests\SupportRequest;

class SupportController extends Controller
{
    public function index()
    {
        return view('support.contact.index');
    }
    
    public function store(SupportRequest $request)
    {
        Support::create($request->validated());
        return redirect()->route('support.contact.success');
    }

    public function success()
    {
        return view('support.contact.success');
    }

    public function faqAndHelp()
    {
        return view('support.faqAndHelp.index');
    }
}
