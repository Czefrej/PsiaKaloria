<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostOrderDiscount extends Mailable
{
    use Queueable, SerializesModels;

    private $order_num;
    private $sh_name;
    private $c_name;
    private $discount;
    private $valid_to;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $order_num, String $sh_name, String $c_name,String $discount, String $valid_to, String $order_link)
    {
        $this->order_num = $order_num;
        $this->sh_name = $sh_name;
        $this->c_name = $c_name;
        $this->discount = $discount;
        $this->valid_to = $valid_to;
        $this->order_link = $order_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kontakt@outerbest.pl', 'Psia Kaloria')->subject("Twoja darowizna #$this->order_num dla $this->sh_name - Psia Kaloria")->view('mail.post-order-discount')->with([
            'order_num' => $this->order_num,
            'sh_name' => $this->sh_name,
            'c_name' => $this->c_name,
            'discount' => $this->discount,
            'valid_to' => $this->valid_to,
            'order_link' =>$this->order_link
        ]);
    }
}
