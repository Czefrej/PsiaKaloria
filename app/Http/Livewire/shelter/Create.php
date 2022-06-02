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
    public $long;
    public $lat;
    public $voivodeship;

    public $ukraine;
    public $active;

    protected $rules = [
        'name' => 'required|max:100',
        'email' => 'required|email',
        'postal' => array('required','regex:/^[_0-9]{2}-[_0-9]{3}$/'),
        'phone' => 'required',
        'address' => 'required|unique:animal_shelters,address',
        'city' => 'required',
        'long' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
        'lat' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        'voivodeship' => ['required', 'in:dolnośląskie,kujawsko-pomorskie,lubelskie,lubuskie,łódzkie,małopolskie,mazowieckie,opolskie,podkarpackie,podlaskie,pomorskie,śląskie,świętokrzyskie,warmińsko-mazurskie,wielkopolskie,zachodniopomorskie']
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
        $shelter->map_latitude = $this->lat;
        $shelter->map_longitude = $this->long;
        $shelter->voivodeship = $this->voivodeship;
        $shelter->save();

        session()->flash('message', "Schronisko $this->name zostało dodane do systemu.");
        return redirect()->route('account.shelter.create');




    }
}
