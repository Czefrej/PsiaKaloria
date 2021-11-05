<?php

namespace App\Http\Livewire;


use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class OrderSummary extends Component
{
    public $donation;
    public $subscription;
    public $delivery;
    public $delivery_price;
    public $price;
    public $payment;
    protected $listeners = ['update_payment_method'=>'updatePaymentMethod', 'update_delivery_method'=>'updateDeliveryMethod'];

    public function mount(){
        $this->price = Cart::total();
    }

    public function render()
    {
        return view('livewire.order-summary');
    }

    public function submit(){
        $this->emit("order_submit");
    }

    public function updateDeliveryMethod($method){
        $this->delivery = $method;

        if(Config::get("shop_config.free_delivery_threshold") - Cart::total()>0){
            $price = ceil(Cart::weight()/$this->delivery['max_package_weight']) * $this->delivery['gross_price_per_package'];
        }else{
            $price = 0;
        }

        $this->delivery_price = $price;
    }

    public function updatePaymentMethod($method){
        $this->payment = $method;
    }
}
