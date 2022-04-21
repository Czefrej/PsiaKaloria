<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShelterPassword extends Mailable
{
    use Queueable, SerializesModels;
    private $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $password)
    {
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kontakt@outerbest.pl', 'Biuro - Psia Kaloria')->view('mail.shelter-password')->with([
            'password' => $this->password,
        ]);
    }
}
