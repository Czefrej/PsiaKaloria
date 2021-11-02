<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCart extends Component
{
    public $quantity;
    public $product;


    public function render()
    {
        return view('livewire.add-to-cart');
    }

    public function mount(){
        $this->quantity = 1;
    }

    public function addToCart(){
        Cart::add($this->product->sku, $this->product->name, $this->quantity, $this->product->getPrice(),$this->product->weight)->associate('App\Models\Product');
        $this->emit('update_quantity', $this->quantity);
        $this->emit('cart_update');
        $this->emit('open_modal');
    }

    public function increment(){
        $this->quantity+=1;
    }

    public function decrement(){
        if($this->quantity-1>=1)
            $this->quantity-=1;
    }

}
