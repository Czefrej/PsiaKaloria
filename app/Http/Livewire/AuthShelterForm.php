<?php

namespace App\Http\Livewire;

use App\Models\AnimalShelter;
use Illuminate\Validation\Rules;
use Livewire\Component;

class AuthShelterForm extends Component
{
    public $company;

    public $name;

    public $surname;

    public $phone;

    public $address;

    public $postal;

    public $city;

    public $country;

    public $company_name;

    public $tax_id;

    public $password;

    public $email;

    public $password_confirmation;

    public $shelters;

    public $shelter_id;

    protected $listeners = [
        'order_submit' => 'submit',
    ];

    public function render()
    {
        return view('livewire.auth-shelter-form');
    }

    protected function rules()
    {
        return [
            'company' => 'required|boolean',
            'register' => 'required',
            'password' => [Rules\Password::defaults(), 'required_if:register,true', 'confirmed'],
            'email' => 'required|email|string|max:255',
            'phone' => 'required',
            'address' => 'required',
            'postal' => 'required',
            'city' => 'required',
            'country' => 'required',
            'shelter_id' => 'numeric|required|exists:animal_shelters,id',
            'name' => 'required_if:company,false',
            'surname' => 'required_if:company,false',
            'tax_id' => 'required_if:company,true',
            'company_name' => 'required_if:company,true',
        ];
    }

    public function mount()
    {
        $this->company = false;
        $this->shelters = AnimalShelter::all();
    }
}
