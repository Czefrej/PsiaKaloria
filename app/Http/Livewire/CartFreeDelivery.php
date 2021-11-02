<?php

namespace App\Http\Livewire;


use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class CartFreeDelivery extends Component
{
    public $remaining;
    public $delivery_discount;
    protected $listeners = ['recalculate_free_delivery'=>'recalculate'];

    public function mount(){
        $this->remaining = 0;
        $this->delivery_discount = 0;

        $this->recalculate();
    }

    public function render()
    {
        return view('livewire.cart-free-delivery');
    }

    public function recalculate(){
        if(($remaining = Config::get("shop_config.free_delivery_threshold") - Cart::total())>0){
            $this->remaining = $remaining;
        }else{
            $this->remaining = 0;
        }
        $this->delivery_discount = ceil(Cart::weight()/30) *20;
    }
}
