<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipments';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'order_id');
    }
}
