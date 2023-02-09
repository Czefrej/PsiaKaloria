<?php

namespace App\Http\Livewire;

use App\Models\AnimalShelter;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;

class GuestShelterForm extends Component
{
    public $company;

    public $name;

    public $surname;

    public $register;

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

    protected function rules()
    {
        $rules = [
            'company' => 'required|boolean',
            'register' => 'required',
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
        if ($this->register) {
            $rules['password'] = ['required_if:register,true', Rules\Password::defaults(), 'confirmed'];
        }

        return $rules;
    }

    public function fillForm()
    {
        $this->name = 'Wiktor';
        $this->surname = 'TEST';
        $this->email = 'test@test.com';
        $this->phone = '+48507632653';
        $this->address = 'Puławska 99';
        $this->postal = '24-100';
        $this->city = 'Puławy';
    }

    public function mount()
    {
        $this->company = false;
        $this->register = false;
        $this->shelters = AnimalShelter::all();
        $this->shelter_id = $this->shelters->first()->id;
        $this->country = 'PL';
    }

    public function render()
    {
        return view('livewire.guest-shelter-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setCompanyPurchase($company_purchase)
    {
        $this->company = $company_purchase;
    }

    public function submit()
    {
        $this->validate();

        if ($this->register) {
            $uniqueness = User::isUniqueEmail($this->email);

            if ($uniqueness === false) {
                $this->validateOnly($this->email, '', '', 'required|string|email|max:255|unique:users');
            }

            $name = 'PK-'.strtoupper(substr(md5($this->email), -6));

            if ($uniqueness == USER::EMAIL_RECURRENT) {
                $user = User::where('email', $this->email)->first();
                $user->password = Hash::make($this->email);
                $user->name = $name;
                $user->save();
            } else {
                $user = User::create([
                    'name' => $name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]);
            }

            event(new Registered($user));
            Auth::login($user);
        }

        if ($this->company) {
            $company_name = $this->company_name;
            $fullname = '';
            $tax_id = $this->tax_id;
        } else {
            $fullname = $this->name.' '.$this->surname;
            $company_name = '';
            $tax_id = '';
        }

        $this->emit('process_form', [
            'email' => $this->email,
            'phone' => $this->phone,
            'shelter_id' => $this->shelter_id,
            'invoice_fullname' => $fullname,
            'invoice_company' => $company_name,
            'invoice_nip' => $tax_id,
            'invoice_address' => $this->address,
            'invoice_postcode' => $this->postal,
            'invoice_city' => $this->city,
            'invoice_country_code' => $this->country,
            'company_purchase' => $this->company, ]);

        //return redirect()->to('/contact-form-success');
    }
}
