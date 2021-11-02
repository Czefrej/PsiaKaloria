<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddedToCartModal extends Component
{
    protected $listeners = [
        'update_quantity'=>'update',
        'open_modal'=>'openModal'];

    public $quantity;
    public $total;
    public $product;

    public function mount(){
        $this->quantity = 1;
        $this->total = 0;
    }

    public function render()
    {
        return view('livewire.added-to-cart-modal');
    }

    public function update($quantity){
        $this->quantity = $quantity;
    }

    public function openModal(){
        $this->dispatchBrowserEvent('openModal');
    }

}
