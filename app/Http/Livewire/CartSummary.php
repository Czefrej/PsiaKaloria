<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class CartSummary extends Component
{
    protected $listeners = ['update_summary' => 'updateSummary'];

    public $free_delivery;

    public $discount;

    public $total;

    public $subscription = false;

    public function mount()
    {
        $this->total = 0;
        $this->free_delivery = false;
        $this->discount = 0;
        $this->updateSummary();
    }

    public function render()
    {
        return view('livewire.cart-summary');
    }

    public function updateSummary()
    {
        $this->total = Cart::total();
        if ($this->total > Config::get('shop_config.free_delivery_threshold')) {
            $this->free_delivery = true;
        } else {
            $this->free_delivery = false;
        }
        $this->calculateDiscount();
    }

    public function calculateDiscount()
    {
    }

    public function calculateWeight()
    {
        Cart::content()->sum('weight');
    }

    public function makeSubscription()
    {
        $this->subscription = true;
    }

    public function makeOneTimePurchase()
    {
        $this->subscription = false;
    }
}
