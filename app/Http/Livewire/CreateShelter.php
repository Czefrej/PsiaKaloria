<?php

namespace App\Http\Livewire;

use App\Models\AnimalShelter;
use Livewire\Component;

class CreateShelter extends Component
{
    public $name;
    public $email;
    public $phone;
    public $postal;
    public $city;
    public $dogs;
    public $cats;
    public $address;

    public $ukraine;
    public $active;

    protected $rules = [
        'name' => 'required|unique:animal_shelters,name|max:90',
        'email' => 'required|email',
        'postal' => array('required','regex:/[0-9]{2}-[0-9]{3}/'),
        'phone' => 'required',
        'address' => 'required|unique:animal_shelters,address',
        'city' => 'required',
        'dogs' => 'required|numeric|gte:0',
        'cats' => 'required|numeric|gte:0'
    ];

    public function render()
    {

        return view('livewire.create-shelter');
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
        $shelter->dogs_amount = $this->dogs;
        $shelter->cats_amount = $this->cats;
        $shelter->phone = $this->phone;
        $shelter->address = $this->address;
        $shelter->ukraine = $ukraine;
        $shelter->active = $active;
        $shelter->city = $this->city;
        $shelter->postal_code = $this->postal;
        $shelter->save();

        session()->flash('message', "Schronisko $this->name zostało dodane do systemu.");
        return redirect("/account/create-shelter");




    }
}
