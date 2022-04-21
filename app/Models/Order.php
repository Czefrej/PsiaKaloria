<?php

namespace App\Models;

use App\Events\OrderCreated;
use App\Events\OrderUpdating;
use App\Events\PackageChanged;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\App;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "id";
    public $incrementing = false;
    public $timestamps = true;

    protected $dispatchesEvents = [
        'created' => OrderCreated::class,
        'updating' => OrderUpdating::class
    ];

    public function user(){
        return $this->belongsTo("App\Models\User","user_id");
    }

    public function savedAddress(){
        return $this->belongsTo("App\Models\SavedAddress","saved_address_id");
    }

    public function shelter(){
        return $this->belongsTo("App\Models\AnimalShelter","shelter_id");
    }

    public function deliveryPaymentAvailability(){
        return $this->belongsTo("App\Models\DeliveryPaymentAvailability","delivery_payment_id");
    }

    public function items(){
        return $this->hasMany("App\Models\OrderItem","order_id","id");
    }

    public function packages(){
        return $this->hasMany("App\Models\Package","order_id","id");
    }

    public static function create(?User $user,?SavedAddress $savedAddress, DeliveryPaymentAvailability $deliveryPaymentAvailability, $status,bool $is_donation,float $due,float $paid,string $source,$items,$shelter, string $payment_intent = null,$note,$delivery_price)
    {
            $result = App::call('App\Http\Controllers\BaselinkerController@newOrder', [
                'payment' => $deliveryPaymentAvailability->payment,
                'delivery' => $deliveryPaymentAvailability->delivery,
                'email' => $user->email,
                'phone' => $shelter->phone,
                'login' => $user->name,
                'delivery_price' => $delivery_price,
                'user_comments' => $note,
                'd_fullname' => "",
                'd_company' => $shelter->name,
                'd_address' => $shelter->address,
                'd_postcode' => $shelter->postal_code,
                'd_country_code' => $shelter->country,
                'd_city' => $shelter->city,
                'd_point_id' => '',
                'd_point_name' => '',
                'd_point_address' => '',
                'd_point_postcode' => '',
                'd_point_city' => '',
                'invoice_fullname' => $savedAddress->fullname,
                'invoice_company' => $savedAddress->company,
                'invoice_nip' => $savedAddress->tax_id,
                'invoice_address' => $savedAddress->address,
                'invoice_postcode' => $savedAddress->postal_code,
                'invoice_city' => $savedAddress->city,
                'invoice_country_code' => $savedAddress->country,
                'company_purchase' => $savedAddress->company_purchase, 'products' => $items, 'status' => $status, 'paid' => $paid]);


            $order_id = $result->getData()->order_id;
            $order = new Order();
            if ($payment_intent != null)
                $order->payment_intent = $payment_intent;
            $order->id = $order_id;
            $order->status = $status;
            $order->is_donation = $is_donation;
            $order->order_page_url = $note;
            $order->due = $due;
            $order->paid = $paid;
            $order->source = $source;
            $order->user()->associate($user);
            $order->deliveryPaymentAvailability()->associate($deliveryPaymentAvailability);
            $order->savedAddress()->associate($savedAddress);
            $order->shelter()->associate($shelter);
            $order->save();

            return $order;
    }

    public static function existsWithID($id){
        $order = Order::find($id);
        if($order!=null)
            return $order;
        else return false;
    }

    public static function updateWithID($id,User $user,SavedAddress $savedAddress, DeliveryPaymentAvailability $deliveryPaymentAvailability, $status,bool $is_donation,string $order_page,float $due,float $paid, string $source)
    {

        $order = Order::find($id);

        if($order == null)
            return false;

        $order->status = $status;
        $order->is_donation = $is_donation;
        //$order->shelter_id = null;

        $order->order_page_url = $order_page;
        $order->due = $due;
        $order->paid = $paid;
        $order->source = $source;

        $user->orders()->save($order);
        $deliveryPaymentAvailability->orders()->save($order);
        $savedAddress->orders()->save($order);
        $order->save();

        return $order;
    }

}
