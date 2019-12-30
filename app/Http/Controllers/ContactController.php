<?php

namespace SuperWorks\Http\Controllers;

use SuperWorks\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use SuperWorks\Mail\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    // public function store(ContactRequest $request)
    // {
    //     Mail::to('jaafar.zbeiba@gmail.com')
    //         ->send(new Contact($request->except('_token')));

    //     return view('confirm');
    // }
}
