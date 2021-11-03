<?php

namespace App\Http\Livewire;

use App\Models\DeliveryMethod;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DeliveryMethodForm extends Component
{
    public $donation;
    public $country_cca2;
    public $methods;
    public $sel;
    public $payment_method;

    protected $listeners = ['update_payment_method'=>'setPaymentMethod'];

    public function mount(){
        $this->payment_method = 0;
        $this->sel = 0;
    }

    public function render()
    {
        return view('livewire.delivery-method-form');
    }

    public function update(){
        $this->methods = DeliveryMethod::join('delivery_payment_availability', 'delivery_id', '=', 'delivery_methods.id')
            ->where('country',$this->country_cca2)
            ->where('active',1)
            ->where('donation_eligible',$this->donation)
            ->where('payment_id',$this->payment_method)
            ->get();


    }

    public function selectDelivery($id){
        $this->sel = $id;
        //UNEXPECTED BEHAVIOR? - DELETE THIS.
        $this->update();
    }

    public function setPaymentMethod($method){
        $this->payment_method = $method;
        $this->update();
    }


}
