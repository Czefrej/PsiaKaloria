<?php

namespace App\Models;

use App\Events\PackageChanged;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'sku';

    public $incrementing = false;

    public $timestamps = true;

    protected $dispatchesEvents = [
        'updated' => PackageChanged::class,
    ];

    public function items()
    {
        return $this->hasMany(\App\Models\OrderItem::class);
    }

    public function getVariants()
    {
        $products = Product::where('brand', $this->brand)->get();

        return $products;
    }




}
