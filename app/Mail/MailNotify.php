<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Données pour la vue

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from("cookwithme867@gmail.com") // L'expéditeur
        ->subject("CookMaster vous informe !! ") // Le sujet
        ->view('email.notify'); // La vue
    }
}
