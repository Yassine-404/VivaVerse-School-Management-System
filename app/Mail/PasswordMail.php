<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordMail extends Mailable
{
    public $user;
    public $etudiants;
    public $password;

    public function __construct($user, $etudiants, $password)
    {
        $this->etudiants = $etudiants;
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Inscription - VivaVerse')->view('password')->with(['password' => $this->password]);
    }
}
