<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTable extends Component
{
    public $quantity = [];

    public function mount()
    {
        $this->update();
    }

    public function render()
    {
        $cart = Cart::content();

        return view('livewire.cart-table', compact('cart'));
    }

    public function update()
    {
        foreach (Cart::content() as $row) {
            $this->quantity[$row->rowId] = $row->qty;
        }
    }

    public function change($row_id)
    {
        Cart::update($row_id, ['qty' => $this->quantity[$row_id]]);
        $this->emit('recalculate_free_delivery');
        $this->emit('update_summary');
    }

    public function increment($row_id)
    {
        $this->quantity[$row_id] += 1;
        Cart::update($row_id, ['qty' => $this->quantity[$row_id]]);
        $this->emit('recalculate_free_delivery');
        $this->emit('update_summary');
    }

    public function decrement($row_id)
    {
        if ($this->quantity[$row_id] - 1 > 0) {
            $this->quantity[$row_id] -= 1;
            Cart::update($row_id, ['qty' => $this->quantity[$row_id]]);
        }
        $this->emit('recalculate_free_delivery');
        $this->emit('update_summary');
    }

    public function remove($row_id)
    {
        Cart::remove($row_id);
        unset($this->quantity[$row_id]);
        $this->emit('recalculate_free_delivery');
        $this->emit('update_summary');
        $this->emit('cart_update');
    }
}
