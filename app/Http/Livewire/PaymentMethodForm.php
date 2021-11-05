<?php

namespace App\Http\Livewire;

use App\Models\DeliveryMethod;
use App\Models\PaymentMethod;
use Livewire\Component;

class PaymentMethodForm extends Component
{
    public $donation;
    public $country_cca2;
    public $methods;
    public $selected;
    public $delivery_method;

    protected $listeners = ['update_delivery_method'=>'setDeliveryMethod'];

    public function mount(){
        $this->update();
    }

    public function render()
    {
        return view('livewire.payment-method-form');
    }

    public function update(){
        if($this->delivery_method == null)
            $id = 0;
        else $id = $this->delivery_method['id'];

        $this->methods = PaymentMethod::join('delivery_payment_availability', 'payment_id', '=', 'payment_methods.id')
            ->where('country',$this->country_cca2)
            ->where('active',1)
            ->where('donation_eligible',$this->donation)
            ->where('delivery_id',$id)
            ->get();
    }

    public function select($id){
        $this->selected = $id;
        $this->update();
        $method = $this->methods->firstWhere('payment_id', $id);
        if($method != null) {
            $this->emit('update_payment_method', $method);
        }else{
            $this->selected=0;
            $this->update();
        }
    }

    public function setDeliveryMethod($method){
        $this->delivery_method = $method;
        $this->update();
    }


    public function setCca2($cca2){
        $this->country_cca2 = $cca2;
        $this->update();
    }
}
