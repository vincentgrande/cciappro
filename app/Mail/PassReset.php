<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class PassReset extends Mailable
{
    use Queueable, SerializesModels;
    public $mail, $mess;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail,$mess)
    {
        $this->mail = $mail ;
        $this->mess = $mess ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Demande de réinitialisation de mot de passe')
                    ->view('pass.mdpreset'); 
    }
}
