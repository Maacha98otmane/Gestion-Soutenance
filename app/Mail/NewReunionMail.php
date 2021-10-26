<?php

namespace App\Mail;

use App\Models\Reunion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewReunionMail extends Mailable
{
    use Queueable;
    use SerializesModels;
    public $reunion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reunion $reunion)
    {
        $this->reunion = $reunion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouvelle réunion')->view('mail.reunion');
    }
}
