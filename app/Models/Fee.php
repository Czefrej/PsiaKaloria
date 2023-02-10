<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'fees';

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'order_id');
    }




}
