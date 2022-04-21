<?php

namespace App\Http\Livewire;


use App\Http\Controllers\BaselinkerController;
use App\Models\AnimalShelter;
use App\Models\DeliveryMethod;
use App\Models\DeliveryPaymentAvailability;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\SavedAddress;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class OrderSummary extends Component
{
    public $donation;
    public $subscription;
    public $delivery;
    public $delivery_price;
    public $price;
    public $payment;
    public $order_note;

    public $email;
    public $name;
    public $country;

    protected $listeners = [
        'update_payment_method'=>'updatePaymentMethod',
        'update_delivery_method'=>'updateDeliveryMethod',
        'update_note'=>'updateOrderNote',
        'process_form'=>'processForm'];

    public function mount(){
        $this->price = Cart::total();
        $this->order_note = "";
    }

    public function render()
    {
        return view('livewire.order-summary');
    }

    public function submit(){
        $this->emit("order_submit");
    }

    public function updateDeliveryMethod($method){
        $this->delivery = DeliveryMethod::find($method['id']);
        $this->realculateDeliveryPrice();

    }

    public function updatePaymentMethod($method){
        $this->payment = PaymentMethod::find($method['payment_id']);
        $this->realculateDeliveryPrice();

        if($this->payment->type != 'cod' && $this->payment->type != 'traditional')
            $this->dispatchBrowserEvent('initPayment',['payment' => $this->payment->id,'user'=>1]);
    }

    public function updateOrderNote($order_note){
        $this->order_note = $order_note;
    }

    public function realculateDeliveryPrice(){
        $this->delivery_price = 0;
        $payment_fee = 0;
        if($this->payment != null){
            $payment_fee = $this->payment->service_fee;
        }
        if($this->delivery != null) {
            if (Config::get("shop_config.free_delivery_threshold") - Cart::total() > 0) {
                $this->delivery_price = ceil(Cart::weight() / $this->delivery['max_package_weight']) * $this->delivery['gross_price_per_package']+$payment_fee;
            }
        }
    }


    public function processForm($data){
        $this->dispatchBrowserEvent('passData',['email' => "wiktor.jeffery@gmail.com",'country'=>"Poland",'name'=>"Wiktor Jeffery"]);

        if($this->payment == null || $this->delivery == null){
            $this->emit('validate');
            return false;
        }

        if(($dp = DeliveryPaymentAvailability::isAvailable($this->payment,$this->delivery)) == false)
            return false;


        if(Auth::check()) {
            $user = Auth::user();
            $login = $user->name;
            $email = $user->email;
        }else{
            $email = $data['email'];
            if(($user = User::existsWithID($email))==false){
                $user = User::createTemporary(null,$email);
                $user->createAsStripeCustomer();
            }

            $login = $user->name;

            if ($this->donation) {
                $shelter = AnimalShelter::find($data['shelter_id']);
                //Error if null
                $phone = $shelter->phone;
                $d_fullname = "";
                $d_company = $shelter->name;
                $d_address = $shelter->address;
                $d_postcode = $shelter->postal_code;
                $d_country_code = $shelter->country;
                $d_city = $shelter->city;

                $invoice_fullname = $data['invoice_fullname'];
                $invoice_company = $data['invoice_company'];
                $invoice_address = $data['invoice_address'];
                $invoice_postcode = $data['invoice_postcode'];
                $invoice_tax_id = $data['invoice_nip'];
                $invoice_city = $data['invoice_city'];
                $invoice_country_code = $data['invoice_country_code'];
                $company_purchase = $data['company_purchase'];

                $invoice_phone = $data['phone'];
                if(($saved_address = SavedAddress::exists($user,$company_purchase,$invoice_fullname,$invoice_company,$invoice_tax_id,$invoice_address,$invoice_postcode,$invoice_city,$invoice_country_code,$invoice_fullname,
                    $invoice_phone,$invoice_company,$invoice_address,$invoice_postcode,$invoice_city,$invoice_country_code,"","","","","")) == false) {
                    $saved_address = SavedAddress::create($user, $company_purchase, $invoice_fullname, $invoice_company, $invoice_tax_id, $invoice_address, $invoice_postcode, $invoice_city, $invoice_country_code, $invoice_fullname,
                        $invoice_phone, $invoice_company, $invoice_address, $invoice_postcode, $invoice_city, $invoice_country_code, "", "", "", "", "");

                }

            } else {
                //$email = $data['email'];

            }
        }

//        $stripeCustomer = $user->updateStripeCustomer(['address'=>['city'=>$invoice_city,'country'=>$invoice_country_code,'postal_code'=>$invoice_postcode,'line1'=>$invoice_address],'phone'=>$invoice_phone,'email'=>$email,'name'=>$invoice_fullname.' '.$invoice_company]);
//
//        dd($stripeCustomer);

        $result = App::call('App\Http\Controllers\BaselinkerController@newOrder',[
            'payment'=>$this->payment,
            'delivery'=>$this->delivery,
            'email'=>$email,
            'phone'=>$phone,
            'login'=>$login,
            'delivery_price'=>$this->delivery_price,
            'user_comments'=>$this->order_note,
            'd_fullname'=>$d_fullname,
            'd_company'=>$d_company,
            'd_address'=>$d_address,
            'd_postcode'=>$d_postcode,
            'd_country_code'=>$d_country_code,
            'd_city'=>$d_city,
            'd_point_id'=>'',
            'd_point_name'=>'',
            'd_point_address'=>'',
            'd_point_postcode'=>'',
            'd_point_city'=>'',
            'invoice_fullname'=>$invoice_fullname,
            'invoice_company'=>$invoice_company,
            'invoice_nip'=>$invoice_tax_id,
            'invoice_address'=>$invoice_address,
            'invoice_postcode'=>$invoice_postcode,
            'invoice_city'=>$invoice_city,
            'invoice_country_code'=>$invoice_country_code,
            'company_purchase'=>$company_purchase,'products'=>$this->getProducts()]);

        $order_id = $result->getData()->order_id;
        $order = Order::create($order_id,$user,$saved_address,$dp,'unpaid',true,"",$this->price+$this->delivery_price,0,"store_new",$shelter);

        if($this->payment->type != "cod" && $this->payment->type != "traditional")
            $this->dispatchBrowserEvent('pay');
        else
            return $this->redirect('/place-order-loggedin');
    }

    public function test(){
        $this->dispatchBrowserEvent('passData',['email' => "wiktor.jeffery@gmail.com",'country'=>"Poland",'name'=>"Wiktor Jeffery"]);

        return false;
    }

    private function getProducts(){
        $items = Cart::content();
        $products = [];
        foreach ($items as $i){
            $products[sizeof($products)] = ['storage'=>'db',
                'product_id'=>$i->model->baselinker_storage_id,
                'name'=>$i->model->name,
                'sku'=>$i->model->sku,
                'ean'=>$i->model->ean,
                'tax_rate'=>$i->model->tax,
                'quantity'=>$i->qty,
                'price_brutto'=>$i->model->gross_base_price,
                'weight'=>$i->model->weight] ;
        }
        return $products;
    }


}
