<?php

namespace App\Http\Controllers;

use App\Models\AnimalShelter;
use App\Models\DeliveryMethod;
use App\Models\DeliveryPaymentAvailability;
use App\Models\Order;
use App\Models\SavedAddress;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'donation'=>'boolean',
            'subscription'=>'boolean',
        ]);
        $donation = $request->input('donation');
        $subscription = $request->input('subscription');


        if($donation && !$subscription){
            return view('pages.order')->with(['donation'=>$donation,'subscription'=>$subscription]);
        }else return abort(404);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {

        $request->validate([
            'payment_intent'=>'required',
            'payment_intent_client_secret'=>'required',
            'redirect_status'=>'required',
        ]);

        $payment_intent = $request->input('payment_intent');
        $payment_intent_client_secret = $request->input('payment_intent_client_secret');
        $status = $request->input('redirect_status');

        if(Order::where('payment_intent',$payment_intent)->count()>0)
            return abort(403);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $pi = PaymentIntent::retrieve($request->input("payment_intent"));
        //dd($pi);
        $pm = PaymentMethod::retrieve($pi->payment_method);

        //dd($pi);
        $total = $pi->amount/100;

        $shelter = AnimalShelter::findOrFail($pi->metadata->sh_id);
        $dp = DeliveryPaymentAvailability::findOrFail($pi->shipping->carrier);
        $payment = $dp->payment;
        $delivery = $dp->delivery;
        $last_charge = null;
        $paid = 0;
        $status = "unpaid";

        if(sizeof($pi->charges->data) > 0) {
            $last_charge = $pi->charges->data[0];
            if($last_charge->status = "succeeded") {
                $paid = $last_charge->amount_captured/100;
                $status = "paid";
            }
        }

        $delivery_price = $this->calculateOrderAmount($payment,$delivery);
        $donation = (($pi->metadata->donation === "true") || ($pi->metadata->donation === true) || ($pi->metadata->donation === "1"));
        $payer = $pm->billing_details;
        $receiver = $pi->shipping;
        $tax_id = $payer->line2;

        $company_purchase = ($pi->metadata->company_purchase === "true");
        $company_name = "";
        $fullname = $payer->name;

        if($company_purchase){
            $company_name = $fullname;
            $fullname = "";
        }



        if($tax_id == null) $tax_id ="";

        if(Auth::check()){
            $user = Auth::user();
        }else if (($user = User::existsWithID($payer->email)) == false) {
            $user = User::createTemporary(null, $payer->email);
            $user->createAsStripeCustomer();
        }

        if (($saved_address = SavedAddress::exists($user, $company_purchase, $fullname, $company_name, $tax_id, $payer->address->line1, $payer->address->postal_code, $payer->address->city, $payer->address->country, $fullname,
                $payer->phone, $company_name, $payer->address->line1, $payer->address->postal_code, $payer->address->city, $payer->address->country, "", "", "", "", "")) == false) {
            $saved_address = SavedAddress::create($user, $company_purchase, $fullname, $company_name, $tax_id, $payer->address->line1, $payer->address->postal_code, $payer->address->city, $payer->address->country, $fullname,
                $payer->phone, $company_name, $payer->address->line1, $payer->address->postal_code, $payer->address->city, $payer->address->country, "", "", "", "", "");

        }

        Order::create($user,$saved_address,$dp,$status,$donation,$total+$delivery_price,$paid,"store_new",$this->getProducts(),$shelter,$pi->id,$pi->metadata->note,$delivery_price);
        Cart::destroy();
        $request->session()->forget(['pi']);

        if($donation)
            return redirect(route('success'));
        else
            return "";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $order = Order::find($id);
        return response()->json($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    private function calculateOrderAmount(\App\Models\PaymentMethod $payment, DeliveryMethod $delivery){
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

        return $delivery_price;
    }

    private function getProducts(){
        $items = Cart::content();
        $products = [];
        foreach ($items as $i){
            $products[sizeof($products)] = ['storage'=>'db',
                'product_id'=>$i->model->baselinker_storage_id,
                'name'=>$i->model->name,
                'sku'=>$i->model->sku,
                'ean'=>$i->model->ean,
                'tax_rate'=>$i->model->tax,
                'quantity'=>$i->qty,
                'price_brutto'=>$i->model->gross_base_price,
                'weight'=>$i->model->weight] ;
        }
        return $products;
    }
}
