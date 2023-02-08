<?php

namespace App\Http\Livewire;

use App\Models\AnimalShelter;
use App\Models\DeliveryMethod;
use App\Models\DeliveryPaymentAvailability;
use App\Models\PaymentMethod;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Order extends Component
{
    public $donation;

    public $subscription;

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

    public $email;

    public $note;

    public $shelters;

    public $shelter_id;

    public $shelter_name;

    public $shelter_phone;

    public $shelter_city;

    public $shelter_address;

    public $shelter_country;

    public $shelter_postal;

    public $dp;

    public $register;

    public $password;

    public $password_confirmation;

    public $payment;

    public $delivery;

    public $delivery_price;

    public $price;

    public $tax_number;

    public $fullname;

    public $session;

    public $idempotent_id;

    public $valid;

    public $buy_button;

    protected $listeners = [
        'update_payment_method' => 'updatePaymentMethod',
        'update_delivery_method' => 'updateDeliveryMethod',
    ];

    public function fillForm()
    {
        $this->name = 'Wiktor';
        $this->surname = 'TEST';
        $this->email = 'test@teste.com';
        $this->phone = '+48507632653';
        $this->address = 'Puławska 99';
        $this->postal = '24-100';
        $this->city = 'Puławy';
    }

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

    public function render()
    {
        return view('livewire.order');
    }

    public function mount()
    {
        $this->idempotent_id = md5(uniqid(rand(), true));
        $this->session = session()->get('pi');
        $this->valid = false;
        $this->company = false;
        $this->register = false;
        $this->buy_button = false;
        $this->shelters = AnimalShelter::all();
        $this->shelter_id = $this->shelters->first()->id;
        $this->country = 'PL';
        $this->price = Cart::total();
        $this->note = '';
    }

    public function setCompanyPurchase($company_purchase)
    {
        $this->company = $company_purchase;
        if ($this->company) {
            $this->fullname = $this->company_name;
            $this->tax_number = $this->tax_id;
        } else {
            $this->fullname = $this->name.' '.$this->surname;
            $this->tax_number = '';
        }
    }

    public function updated($propertyName)
    {
        $this->valid = false;
        $this->buy_button = false;
        try {
            $this->validate();
        } catch (\Exception $e) {
            $this->emit('form-invalid');
            $this->validate();
        }
        $this->emit('form-valid');
        $this->valid = true;

        $shelter = AnimalShelter::find($this->shelter_id);
        $this->shelter_city = $shelter->city;
        $this->shelter_country = $shelter->country;
        $this->shelter_postal = $shelter->postal_code;
        $this->shelter_phone = $shelter->phone;
        $this->shelter_address = $shelter->address;
        $this->shelter_name = $shelter->name;

        if ($this->company) {
            $this->fullname = $this->company_name;
            $this->tax_number = $this->tax_id;
        } else {
            $this->fullname = $this->name.' '.$this->surname;
            $this->tax_number = '';
        }
    }

    public function updateDeliveryMethod($method)
    {
        $this->buy_button = false;
        $this->delivery = DeliveryMethod::findOrFail($method['id']);
        $this->realculateDeliveryPrice();
    }

    public function updatePaymentMethod($method)
    {
        $this->payment = PaymentMethod::findOrFail($method['payment_id']);
        $this->realculateDeliveryPrice();
        if ($this->payment->type != 'cod' && $this->payment->type != 'traditional') {
            $dp = DeliveryPaymentAvailability::isAvailable($this->payment, $this->delivery);
            $this->dp = $dp->id;
            $this->dispatchBrowserEvent('initPayment', ['dp' => $dp->id, 'user' => 1]);
        }
        $buy_button = true;
    }

    public function realculateDeliveryPrice()
    {
        $this->delivery_price = 0;
        $payment_fee = 0;
        if ($this->payment != null) {
            $payment_fee = $this->payment->service_fee;
        }
        if ($this->delivery != null) {
            if (Config::get('shop_config.free_delivery_threshold') - Cart::total() > 0) {
                $this->delivery_price = ceil(Cart::weight() / $this->delivery['max_package_weight']) * $this->delivery['gross_price_per_package'] + $payment_fee;
            }
        }
    }

    public function submit()
    {
        if ($this->payment == null || $this->delivery == null) {
            $this->emit('validate');

            return false;
        }

        return true;
    }
}
