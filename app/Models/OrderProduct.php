<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = "products_orders";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;

    public function product(){
        return $this->belongsTo("App\Models\Product", "sku","sku");
    }

    public function order(){
        return $this->belongsTo("App\Models\Order","order_id","order_id");
    }

    public static function addProduct(Order $order,Product $product, float $gross_price, int $quantity){
        $op = new OrderProduct();
        $op->gross_price = $gross_price;
        $op->quantity = $quantity;

        $op->product()->associate($product);
        $op->order()->associate($order);
        $op->save();

        return $op;

    }
}
