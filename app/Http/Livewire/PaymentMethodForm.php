<?php

namespace App\Http\Livewire;

use App\Models\PaymentMethod;
use Livewire\Component;

class PaymentMethodForm extends Component
{
    public $donation;
    public $country_cca2;
    public $methods;
    public $selected;


    public function mount(){
        $this->update();
    }

    public function render()
    {
        return view('livewire.payment-method-form');
    }

    public function update(){
        $this->methods = PaymentMethod::where('donation_eligible',$this->donation)
            ->where('country',$this->country_cca2)->where('active',1)->get();
        $this->selected = 0;
    }

    public function select($id){
        $this->selected = $id;
        $this->emit('update_payment_method',$this->selected);
    }

    public function setCca2($cca2){
        $this->country_cca2 = $cca2;
        $this->update();
    }
}
