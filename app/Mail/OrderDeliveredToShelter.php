<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDeliveredToShelter extends Mailable
{
    use Queueable, SerializesModels;

    private $order_num;

    private $sh_name;

    private $c_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $order_num, string $sh_name, string $c_name)
    {
        $this->order_num = $order_num;
        $this->sh_name = $sh_name;
        $this->c_name = $c_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kontakt@outerbest.pl', 'Psia Kaloria')->subject("Twoja darowizna dla $this->sh_name została dostarczona - Psia Kaloria")->view('mail.order-delivered-to-shelter')->with([
            'order_num' => $this->order_num,
            'sh_name' => $this->sh_name,
            'c_name' => $this->c_name,
        ]);
    }
}
