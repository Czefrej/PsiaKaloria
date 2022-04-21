<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddedToCartModal extends Component
{
    protected $listeners = [
        'open_modal'=>'openModal'
    ];

    public $dropdown_id;
    public $cart;

    public function mount(){
        $this->cart = Cart::content();
    }

    public function render()
    {
        return view('livewire.added-to-cart-modal');
    }

    public function openModal(){
        $this->cart = Cart::content();
        $this->dispatchBrowserEvent('openModal');
    }

}
