<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contact extends Mailable
{
    use Queueable, SerializesModels;
    public $sujet, $name, $firstname, $mess;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sujet, $name, $firstname, $mess)
    {
        $this->sujet = $sujet;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->mess = $mess;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Nouveau message")
                    ->view('mail.contact'); 
    }
}
