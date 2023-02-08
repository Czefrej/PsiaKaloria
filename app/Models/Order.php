<?php

namespace App\Models;

use App\Events\OrderCreated;
use App\Events\OrderUpdating;
use App\Events\PackageChanged;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\App;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "order_id";
    public $incrementing = false;
    public $timestamps = true;

    protected $dispatchesEvents = [
//        'created' => OrderCreated::class,
//        'updating' => OrderUpdating::class
    ];

    public function products(){
        return $this->hasMany("App\Models\OrderProduct","order_id","id");
    }

//    public function packages(){
//        return $this->hasMany("App\Models\Package","order_id","id");
//    }

    public static function create(int $order_id,string $ext_order_id, string $source, string $datetime, string $country_code, string $postal_code,bool $is_smart,int $delivery_net_price,bool $is_cod,string $currency)
    {
            //TODO: VALIDATION
        if(self::existsWithID($order_id))
            return false;

        try {
            $datetime = DateTime::createFromFormat('d.m.Y H:i:s', $datetime)->format('Y-m-d H:i:s');
        }catch (\Exception $exception){
            return false;
        }

        if(empty($is_smart))
            $is_smart = 0;
        else
            $is_smart = 1;

        if(empty($is_cod))
            $is_cod = 0;
        else
            $is_cod = 1;


        $order = new Order();
        $order->order_id = $order_id;
        $order->ext_order_id = $ext_order_id;
        $order->source = $source;
        $order->country_code = $country_code;
        $order->postal_code = $postal_code;
        $order->allegro_smart = $is_smart;
        $order->delivery_net_price = $delivery_net_price;
        $order->date = $datetime;
        $order->cod = $is_cod;
        $order->currency = $currency;
//            $order->user()->associate($user);
//            $order->deliveryPaymentAvailability()->associate($deliveryPaymentAvailability);
//            $order->savedAddress()->associate($savedAddress);
//            $order->shelter()->associate($shelter);
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
