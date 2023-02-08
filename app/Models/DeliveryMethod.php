<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class DeliveryMethod extends Model
{
    use HasFactory;

    protected $table = 'delivery_methods';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    public static function methodExists(string $name, string $country_cca2)
    {
        throw_if(! cca2Verify($country_cca2), "Country code is invalid. ('$country_cca2')");

        $method = DeliveryMethod::where('name', Config::get("mappings.baselinker.delivery.$name") ?: $name)->first();

        if ($method != null) {
            return $method;
        } else {
            return false;
        }
    }

    public function getBaselinkerName()
    {
        return Config::get("mappings.baselinker.delivery.$this->name") ?: $this->name;
    }
}
