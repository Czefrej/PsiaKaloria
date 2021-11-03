<?php

namespace App\Http\Livewire;

use App\Models\AnimalShelter;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Validation\Rules;
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
        'order_submit'=>"submit"
    ];

    protected function rules()
    {
        return [
            'company' => 'required|boolean',
            'register' => 'required',
            'password' => [Rules\Password::defaults(),'required_if:register,true','confirmed'],
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

    public function mount(){
        $this->company = false;
        $this->register = false;
        $this->shelters = AnimalShelter::all();
    }

    public function render()
    {
        return view('livewire.guest-shelter-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setCompanyPurchase($company_purchase){
        $this->company = $company_purchase;
    }

    public function submit(){
        $this->validate();
        $user = null;
        if($this->register){
            $uniqueness = User::isUniqueEmail($this->email);

            if($uniqueness === false)
                $this->validateOnly($this->email, "","",'required|string|email|max:255|unique:users');


            $name = "PK-".strtoupper(substr(md5($this->email),-6));

            if ($uniqueness == USER::EMAIL_RECURRENT){
                $user = User::where('email',$this->email)->first();
                $user->password = Hash::make($this->email);
                $user->name = $name;
                $user->save();

            }else{

                $user = User::create([
                    'name' => $name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]);

            }

            event(new Registered($user));
            Auth::login($user);
        }



        return redirect()->to('/contact-form-success');
    }
}
