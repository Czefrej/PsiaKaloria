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

}
