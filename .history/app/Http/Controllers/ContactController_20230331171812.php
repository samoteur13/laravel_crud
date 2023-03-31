<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function create ()
    {
        return view('contact');
    }

    public function store (ContactRequest $request)
    {
        Mail:to('administrateur@chezmoi.com')
        ->send(new Contact($request->except('_token')));
        
        return view('confirm');
    }
}
