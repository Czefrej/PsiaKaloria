<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "sku";
    public $incrementing = false;
    public $timestamps = true;

    public function items(){
        return $this->hasMany("App\Models\OrderItem");
    }

    public function getVariants(){
        $products = Product::where('brand',$this->brand)->get();
        return $products;
    }

    public function getPrice(){
        if($this->gross_base_price < $this->regular_price)
            return $this->gross_base_price;
        else return $this->regular_price;
    }

}
