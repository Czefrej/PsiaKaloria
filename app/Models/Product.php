<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Buyable
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
        return $this->hasMany("App\Models\OrderItem");
    }

    public function getVariants()
    {
        $products = Product::where('brand', $this->brand)->get();

        return $products;
    }

    public function getBuyableIdentifier($options = null)
    {
        // TODO: Implement getBuyableIdentifier() method.
        return $this->sku;
    }

    public function getBuyableDescription($options = null)
    {
        // TODO: Implement getBuyableDescription() method.
        return $this->description;
    }

    public function getBuyablePrice($options = null)
    {
        // TODO: Implement getBuyablePrice() method.
        return $this->regular_price;
    }

    public function getBuyableWeight($options = null)
    {
        // TODO: Implement getBuyableWeight() method.
        return $this->weight;
    }
}
