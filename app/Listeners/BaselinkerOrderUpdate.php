<?php

namespace App\Listeners;

use Illuminate\Support\Facades\App;

class BaselinkerOrderUpdate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        $order = $event->order;

        if ($order->status != $order->getOriginal('status')) {
            if ($order->status == 'paid') {
                $order->paid = $order->due;
                $this->callBaselinkerMethod('setOrderPayment', ['order' => $order, 'payment_done' => $order->due]);
            } else {
                $this->callBaselinkerMethod('setOrderStatus', ['order' => $order, 'status' => $order->status]);
            }
        }

        if ($order->paid != $order->getOriginal('paid')) {
            $this->callBaselinkerMethod('setOrderPayment', ['order' => $order, 'payment_done' => $order->paid]);
            if ($order->paid < $order->due && $order->status != 'unpaid') {
                $this->callBaselinkerMethod('setOrderStatus', ['order' => $order, 'status' => 'unpaid']);
            }
        }
    }

    public function callBaselinkerMethod($method, $data)
    {
        App::call('App\Http\Controllers\BaselinkerController@'.$method, $data);
    }
}
