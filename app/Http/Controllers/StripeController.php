<?php

namespace App\Http\Controllers;

use App\Models\AnimalShelter;
use App\Models\DeliveryMethod;
use App\Models\DeliveryPaymentAvailability;
use App\Models\PaymentMethod;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Stripe\PaymentIntent;
use function Sentry\captureMessage;

class StripeController extends Controller
{


    public function index(Request $request){
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $pi = null;
        if($request->session()->exists('pi')){
            $pi = $request->session()->get('pi');
            if($pi == null) {
                $request->session()->forget(['pi']);
                return abort(400);
            }

        }
        try {
            // retrieve JSON from POST body
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);
            $dp = DeliveryPaymentAvailability::findOrFail($jsonObj->data->dp);
            $payment = $dp->payment;
            $delivery = $dp->delivery;
            $sh_id = $jsonObj->data->sh_id;
            $donation = $jsonObj->data->donation;
            $note = $jsonObj->data->note;
            $company_purchase = $jsonObj->data->company_purchase;
            $email = $jsonObj->data->email;
            $idempotent_key = $jsonObj->data->idempotent_id;

            $cus = null;
            if (($user = User::existsWithID($email)) != false) {
                $cus = $user->stripe_id;
            }
            $amount = $this->calculateOrderAmount($payment, $delivery);
            $currency = "pln";

            if ($pi == null) {
                //$user = Auth::findOrFail($jsonObj->data->user);

                if ($payment->type != "cod" && $payment->type != "traditional") {
                    // Create a PaymentIntent with amount and currency

                    $paymentIntent = \Stripe\PaymentIntent::create([
                        'amount' => $amount,
                        'currency' => $currency,
                        'payment_method_types' => [
                            $dp->payment->type
                        ],
                        'metadata' => [
                            'sh_id' => $sh_id,
                            'donation' => $donation,
                            'note' => $note,
                            'company_purchase' => $company_purchase
                        ],
                        'customer' => $cus
                    ], ["idempotency_key" => $idempotent_key,]);
                }


                $request->session()->put('pi', $paymentIntent->id);
                $output = [
                    'clientSecret' => $paymentIntent->client_secret,
                ];

            } else {
                $paymentIntent = PaymentIntent::retrieve($pi);
                PaymentIntent::update($pi, [[
                    'amount' => $amount,
                    'currency' => $currency,
                    'payment_method_types' => [
                        $dp->payment->type
                    ],
                    'metadata' => [
                        'sh_id' => $sh_id,
                        'donation' => $donation,
                        'note' => $note,
                        'company_purchase' => $company_purchase
                    ],
                    'customer' => $cus
                ]]);

                $output = [
                    'clientSecret' => $paymentIntent->client_secret,
                ];

            }
        }catch (\Exception $e){
            captureMessage($e->getMessage());
        }

        return response()->json($output);

    }

    private function calculateOrderAmount(PaymentMethod $payment, DeliveryMethod $delivery){
        $total = (float) Cart::total();

        $delivery_price = 0;
        $payment_fee = 0;
        if($payment != null){
            $payment_fee = $payment->service_fee;
        }
        if($delivery != null) {
            if (Config::get("shop_config.free_delivery_threshold") - Cart::total() > 0) {
                $delivery_price = ceil(Cart::weight() / $delivery['max_package_weight']) * $delivery['gross_price_per_package']+$payment_fee;
            }
        }

        return ($total + $delivery_price)*100;
    }
}
