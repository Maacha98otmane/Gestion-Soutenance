<?php

namespace App\Mail;

use App\Models\projet;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewProjetMail extends Mailable
{
    use Queueable;
    use SerializesModels;
    public $projet;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(projet $projet)
    {
        $this->projet = $projet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Votre Etudiant envoie une demande de soutenance')->view('mail.mail');
    }
}
