<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCoupon extends Component
{
    public $code;

    public $invalid;

    public function mount()
    {
        $this->code = '';
        $this->invalid = false;
    }

    public function render()
    {
        return view('livewire.cart-coupon');
    }

    public function redeem()
    {
        $this->invalid = true;
    }
}
