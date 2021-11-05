<?php

namespace App\Http\Livewire;

use App\Models\DeliveryMethod;
use Livewire\Component;

class DeliveryMethodForm extends Component
{
    public $donation;
    public $country_cca2;
    public $methods;
    public $selected;
    public $payment_method;

    public function mount(){
        $this->payment_method = 0;
        $this->update();
    }

    public function render()
    {
        return view('livewire.delivery-method-form');
    }

    public function update(){

        $this->methods = DeliveryMethod::where('donation_eligible',$this->donation)
            ->where('country',$this->country_cca2)->where('active',1)->get();
    }

    public function selectDelivery($id){
        $this->selected = $id;
        //UNEXPECTED BEHAVIOR? - DELETE THIS.
        //$this->update();
        $method = $this->methods->find($id);
        $this->emit('update_delivery_method',$method);
    }


}
