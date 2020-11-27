<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class registerMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $firstname;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $firstname)
    {
        $this->name = $name;
        $this->firstname = $firstname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Inscription validée à CCIAPPRO')
                    ->view('mail.register'); 
    }
}
