<?php

namespace App\Http\Controllers;

use App\Http\Livewire\shelter\Order;
use Illuminate\Http\Request;
use Laravel\Cashier\Events\WebhookReceived;
use Laravel\Cashier\Http\Controllers\WebhookController;
use function Sentry\captureMessage;

class StripeHookController
{
    //

    public function handle(Request $request){

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $endpoint_secret = env('STRIPE_ENDPOINT_SECRET');

        $payload = @file_get_contents('php://input');
        $event = null;

        try {
            $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch(\UnexpectedValueException $e) {
            return abort(400, $e->getMessage());
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            return abort(400, $e->getMessage());
        } catch (\Exception $e){
            return abort(400, $e->getMessage());
        }

        $payload = json_decode($request->getContent(), true);
        event(new WebhookReceived($payload));

        return response()->json($event);

    }
}