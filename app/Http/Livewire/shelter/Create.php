<?php

namespace App\Http\Livewire\shelter;

use App\Models\AnimalShelter;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;
    public $phone;
    public $postal;
    public $city;
    public $address;

    public $ukraine;
    public $active;

    protected $rules = [
        'name' => 'required|unique:animal_shelters,name|max:90',
        'email' => 'required|email',
        'postal' => array('required','regex:/^[_0-9]{2}-[_0-9]{3}$/'),
        'phone' => 'required',
        'address' => 'required|unique:animal_shelters,address',
        'city' => 'required',
    ];

    public function render()
    {
        return view('livewire.shelter.create');
    }

    public function submit(){
        $this->validate();

        if ($this->ukraine == null)
            $ukraine = false;
        else $ukraine = true;
        if ($this->active == null)
            $active = false;
        else $active = true;

        $shelter = new AnimalShelter();
        $shelter->name = $this->name;
        $shelter->country = "PL";
        $shelter->email = $this->email;
        $shelter->phone = $this->phone;
        $shelter->address = $this->address;
        $shelter->ukraine = $ukraine;
        $shelter->active = $active;
        $shelter->city = $this->city;
        $shelter->postal_code = $this->postal;
        $shelter->save();

        session()->flash('message', "Schronisko $this->name zostało dodane do systemu.");
        return redirect(route('account.shelter.create'));




    }
}
