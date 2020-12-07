<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contact extends Mailable
{
    use Queueable, SerializesModels;
    public $sujet, $name, $firstname, $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sujet, $name, $firstname, $message)
    {
        $this->sujet = $sujet;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($sujet)
                    ->view('mail.contact'); 
    }
}
