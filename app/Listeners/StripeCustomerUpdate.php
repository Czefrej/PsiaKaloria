<?php

namespace App\Listeners;

class StripeCustomerUpdate
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
        $savedAddress = $order->savedAddress;
        //dd($order->savedAddress->id);
        $user = $order->user;
        //dd($savedAddress);
        $stripeCustomer = $user->updateStripeCustomer(['address' => ['city' => $savedAddress->city, 'country' => $savedAddress->country, 'postal_code' => $savedAddress->postal_code, 'line1' => $savedAddress->address], 'phone' => $savedAddress->delivery_phone, 'email' => $user->email, 'name' => trim($savedAddress->fullname.' '.$savedAddress->company)]);
    }
}
