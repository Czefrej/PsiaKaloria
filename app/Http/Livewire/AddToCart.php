<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCart extends Component
{
    public $quantity = 1;
    public $product;


    public function render()
    {
        return view('livewire.add-to-cart');
    }

    public function mount(){
        $this->quantity = 1;
    }

    public function addToCart(){
        $item = Cart::search(function ($cartItem, $rowId) {
            return $cartItem->id === $this->product->sku;
        })->first();

        if(($i = $item) == null)
            $qty = 0;
        else $qty = $i->qty;

        if($qty + $this->quantity <= 99){
            Cart::add($this->product->sku, $this->product->name, $this->quantity, $this->product->getPrice(), $this->product->weight)->associate('App\Models\Product');
            $this->emit('cart_update');
            $this->emit('open_modal');
        }else{
            session()->flash('message', 'Maksymalna ilość w koszyku to 99.');
        }
    }


}
