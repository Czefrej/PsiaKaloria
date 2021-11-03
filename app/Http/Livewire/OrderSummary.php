<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderSummary extends Component
{
    public $donation;
    public $subscription;

    public function render()
    {
        return view('livewire.order-summary');
    }

    public function submit(){
        $this->emit("order_submit");
    }
}
