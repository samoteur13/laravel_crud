<?php

namespace App\Http\Controllers;


use App\Mail\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
 
class ContactsController extends Controller
{
    public function create ()
    {
        return view('contact');
    }


    //envoie directement par email
    // public function store (ContactRequest $request)
    // {
    //     Mail::to('administrateur@chezmoi.com')
    //     ->send(new Contact($request->except('_token')));

    //     return view('confirm');
    // }

    //enregistre en bdd
    public function store (Request $request)
    {
        $this->validate($request, [
            'email' => 'bail|required|email',
            'message' => 'bail|required|max:500'
        ]);

        $contact = new \App\Models\Contact;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return "C'est bien enregistré !";
    }
}
