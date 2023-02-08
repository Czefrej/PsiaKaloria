<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPaymentAvailability extends Model
{
    use HasFactory;

    protected $table = 'delivery_payment_availability';

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $timestamps = true;

    public function orders()
    {
        return $this->hasMany("App\Models\Order", 'delivery_payment_id');
    }

    public function payment()
    {
        return $this->belongsTo("App\Models\PaymentMethod");
    }

    public function delivery()
    {
        return $this->belongsTo('App\Models\DeliveryMethod');
    }

    public static function isAvailable(PaymentMethod $paymentMethod, DeliveryMethod $deliveryMethod)
    {
        $dp_availability = DeliveryPaymentAvailability::where('payment_id', $paymentMethod->id)
            ->where('delivery_id', $deliveryMethod->id)->first();

        if ($dp_availability != null) {
            return $dp_availability;
        } else {
            return false;
        }
    }
}
