<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function test_email()
    {
        $data = [
            'name' => 'John Doe',
            'message' => 'Hello, Laravel!',
        ];

        $mail = new MailNotify($data);

        Mail::to('lucas.lm.miller@gmail.com')->send($mail);

        return back()->with('message', 'Email successfully sent!');

    }
}
