<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShelterPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $password;

    private $id;

    private $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $password, int $id, string $email)
    {
        $this->password = $password;
        $this->id = $id;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kontakt@outerbest.pl', 'Psia Kaloria')->subject('Konto do platformy dla schronisk - Psia Kaloria')->view('mail.shelter-password')->with([
            'password' => $this->password,
            'email' => $this->email,
            'id' => $this->id,
        ]);
    }
}
