<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "order_items";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;

    public function product(){
        return $this->belongsTo("App\Models\Product", "product_sku","sku");
    }

    public function order(){
        return $this->belongsTo("App\Models\Order","order_id","id");
    }

    public static function addProduct(Order $order,Product $product, float $unit_price, int $quantity){
        $oi = new OrderItem();
        $oi->unit_price = $unit_price;
        $oi->quantity = $quantity;

        $oi->product()->associate($product);
        $oi->order()->associate($order);
        $oi->save();

        return $oi;

    }

    public static function deleteAllProducts(Order $order){
        OrderItem::where('order_id',$order->id)->delete();

    }
}
