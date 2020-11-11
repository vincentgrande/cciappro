<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirmationCommande extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $firstname, $cart)
    {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->cart = $cart;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation de votre commande') // ceci sera le sujet de l'e-mail
                    ->view('email.confirmationCommande'); // Ceci est le fichier contactMail.blade.php traité ci-après
    }
}
