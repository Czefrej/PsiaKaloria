<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderInvoice extends Mailable
{
    use Queueable, SerializesModels;
    private $order_num;
    private $sh_name;
    private $c_name;
    private $invoice_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $order_num, String $sh_name, String $c_name, String $invoice_link)
    {
        $this->order_num = $order_num;
        $this->sh_name = $sh_name;
        $this->c_name = $c_name;
        $this->invoice_link = $invoice_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kontakt@outerbest.pl', 'Psia Kaloria')->subject("Faktura zamówienie #$this->order_num - Psia Kaloria")->view('mail.order-invoice')->with([
            'order_num' => $this->order_num,
            'sh_name' => $this->sh_name,
            'c_name' => $this->c_name,
            'invoice_link'=>$this->invoice_link
        ]);
    }
}
