<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['cart_update' => 'update'];

    public $counter;

    public function mount()
    {
        $this->update();
    }

    public function render()
    {
        return view('livewire.cart-counter');
    }

    public function update()
    {
        $this->counter = Cart::content()->count();
    }
}
