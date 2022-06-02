<?php

namespace App\Http\Livewire\shelter;

use App\Models\AnimalShelter;
use Livewire\Component;

class Edit extends Component
{
    public $shelter;

    protected function rules()
    {
        return [
            'shelter.name' => 'required|max:100',
            'shelter.email' => 'required|email',
            'shelter.postal_code' => array('required','regex:/^[_0-9]{2}-[_0-9]{3}$/'),
            'shelter.phone' => 'required',
            'shelter.address' => 'required|unique:animal_shelters,address,'.$this->shelter->id,
            'shelter.city' => 'required',
            'shelter.ukraine'=>'',
            'shelter.active'=>'',
            'shelter.map_latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'shelter.map_longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'shelter.voivodeship' => ['required','in:dolnośląskie,kujawsko-pomorskie,lubelskie,lubuskie,łódzkie,małopolskie,mazowieckie,opolskie,podkarpackie,podlaskie,pomorskie,śląskie,świętokrzyskie,warmińsko-mazurskie,wielkopolskie,zachodniopomorskie']
        ];
    }

    public function render()
    {
        return view('livewire.shelter.edit');
    }

    public function submit()
    {
        $this->validate();

        if ($this->shelter->ukraine == null)
            $this->shelter->ukraine = false;
        else $this->shelter->ukraine = true;
        if ($this->shelter->active == null)
            $this->shelter->active = false;
        else $this->shelter->active = true;

        $this->shelter->save();
        $name = $this->shelter->name;
        session()->flash('message', "Schronisko $name zostało zaktualizowane.");
        return redirect()->route('account.shelter.edit', $this->shelter->id);
    }
}
