<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderNote extends Component
{
    public $note;

    public function render()
    {
        return view('livewire.order-note');
    }
}
