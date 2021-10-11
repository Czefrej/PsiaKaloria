<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "id";
    public $incrementing = false;
    public $timestamps = true;

    public function user(){
        return $this->belongsTo("App\Models\User","user_id");
    }

    public function savedAddress(){
        return $this->belongsTo("App\Models\SavedAddress","saved_address_id");
    }

    public function deliveryPaymentAvailability(){
        return $this->belongsTo("App\Models\DeliveryPaymentAvailability","delivery_payment_id");
    }

    public function items(){
        return $this->hasMany("App\Models\OrderItem","order_id","id");
    }

    public static function create($id,User $user,SavedAddress $savedAddress, DeliveryPaymentAvailability $deliveryPaymentAvailability, $status,bool $is_donation,string $order_page,float $due,float $paid,string $source)
    {
        $order = new Order();
        $order->id = $id;
        $order->status = $status;
        $order->is_donation = $is_donation;
        $order->shelter_id = null;
        $order->order_page_url = $order_page;
        $order->due = $due;
        $order->paid = $paid;
        $order->source = $source;
        $deliveryPaymentAvailability->orders()->save($order);
        $user->orders()->save($order);
        $savedAddress->orders()->save($order);
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
        $order->shelter_id = null;

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
