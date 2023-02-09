<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedAddress extends Model
{
    use HasFactory;

    protected $table = 'saved_addresses';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'saved_address_id', 'id');
    }

    public static function create(User $user, bool $company_purchase, string $invoice_fullname, string $invoice_company, string $invoice_tax_id, string $invoice_address, string $invoice_postal_code, string $invoice_city, string $invoice_country_cca2,
                                  string $delivery_fullname, string $delivery_phone, string $delivery_company, string $delivery_address, string $delivery_postal_code, string $delivery_city, string $delivery_country_cca2,
                                  string $delivery_point_id, string $delivery_point_name, string $delivery_point_address, string $delivery_point_postal_code, string $delivery_point_city)
    {
        $dp_id = $delivery_point_id;

        $invoice_fullname = convertToName($invoice_fullname);
        $d_fullname = convertToName($delivery_fullname);
        $dp_name = $delivery_point_name;

        $d_phone = convertToPhone($delivery_phone);
        $invoice_tax_id = convertToPhone($invoice_tax_id);

        $invoice_address = convertToName($invoice_address);
        $d_address = convertToName($delivery_address);
        $dp_address = convertToName($delivery_point_address);

        $invoice_city = convertToName($invoice_city);
        $d_city = convertToName($delivery_city);
        $dp_city = convertToName($delivery_point_city);

        throw_if(! cca2Verify($invoice_country_cca2), "Country code is invalid. ('$invoice_country_cca2')");

        if ($invoice_country_cca2 != $delivery_country_cca2) {
            throw_if(! cca2Verify($delivery_country_cca2), "Country code is invalid. ('$delivery_country_cca2')");
        }

        $d_country_cca2 = $delivery_country_cca2;
        $d_postal_code = $delivery_postal_code;
        $dp_postal_code = $delivery_point_postal_code;
        $d_company = $delivery_company;

//        //ADD GUS API SUPPORT
//        $company = convertToName($company);
//        $d_company = convertToName($delivery_company);

        $saved_address = new SavedAddress();
        $saved_address->company_purchase = $company_purchase;
        $saved_address->fullname = $invoice_fullname;
        $saved_address->company = $invoice_company;
        $saved_address->tax_id = $invoice_tax_id;
        $saved_address->address = $invoice_address;
        $saved_address->postal_code = $invoice_postal_code;
        $saved_address->city = $invoice_city;
        $saved_address->country = $invoice_country_cca2;

        $saved_address->delivery_fullname = $d_fullname;
        $saved_address->delivery_phone = $d_phone;
        $saved_address->delivery_address = $d_address;
        $saved_address->delivery_postal_code = $d_postal_code;
        $saved_address->delivery_city = $d_city;
        $saved_address->delivery_country = $d_country_cca2;
        $saved_address->delivery_company = $d_company;

        $saved_address->delivery_point_id = $dp_id;
        $saved_address->delivery_point_name = $dp_name;
        $saved_address->delivery_point_address = $dp_address;
        $saved_address->delivery_point_postal_code = $dp_postal_code;
        $saved_address->delivery_point_city = $dp_city;
        $user->savedAddresses()->save($saved_address);
        $saved_address->save();

        return $saved_address;
    }

    public static function exists(User $user, bool $company_purchase, string $invoice_fullname, string $invoice_company, string $invoice_tax_id, string $invoice_address, string $invoice_postal_code, string $invoice_city, string $invoice_country_cca2,
                                  string $delivery_fullname, string $delivery_phone, string $delivery_company, string $delivery_address, string $delivery_postal_code, string $delivery_city, string $delivery_country_cca2,
                                  string $delivery_point_id, string $delivery_point_name, string $delivery_point_address, string $delivery_point_postal_code, string $delivery_point_city)
    {
        $dp_id = $delivery_point_id;

        $invoice_fullname = convertToName($invoice_fullname);
        $d_fullname = convertToName($delivery_fullname);
        $dp_name = $delivery_point_name;

        $d_phone = convertToPhone($delivery_phone);
        $invoice_tax_id = convertToPhone($invoice_tax_id);

        $invoice_address = convertToName($invoice_address);
        $d_address = convertToName($delivery_address);
        $dp_address = convertToName($delivery_point_address);

        $invoice_city = convertToName($invoice_city);
        $d_city = convertToName($delivery_city);
        $dp_city = convertToName($delivery_point_city);

        throw_if(! cca2Verify($invoice_country_cca2), "Country code is invalid. ('$invoice_country_cca2')");

        if ($invoice_country_cca2 != $delivery_country_cca2) {
            throw_if(! cca2Verify($delivery_country_cca2), "Country code is invalid. ('$delivery_country_cca2')");
        }

        $d_country_cca2 = $delivery_country_cca2;
        $d_postal_code = $delivery_postal_code;
        $dp_postal_code = $delivery_point_postal_code;
        $d_company = $delivery_company;

        $saved_address = SavedAddress::where('user_id', $user->id)
            ->where('company_purchase', $company_purchase)
                ->where('fullname', $invoice_fullname)
                ->where('company', $invoice_company)
                ->where('tax_id', $invoice_tax_id)
                ->where('address', $invoice_address)
                ->where('postal_code', $invoice_postal_code)
                ->where('city', $invoice_city)
                ->where('country', $invoice_country_cca2)
                ->where('delivery_fullname', $d_fullname)
                ->where('delivery_phone', $d_phone)
                ->where('delivery_company', $d_company)
                ->where('delivery_address', $d_address)
                ->where('delivery_postal_code', $d_postal_code)
                ->where('delivery_city', $d_city)
                ->where('delivery_country', $d_country_cca2)
                ->where('delivery_point_id', $dp_id)
                ->where('delivery_point_name', $dp_name)
                ->where('delivery_point_address', $dp_address)
                ->where('delivery_point_postal_code', $dp_postal_code)
                ->where('delivery_point_city', $dp_city)->first();

        if ($saved_address != null) {
            return $saved_address;
        } else {
            return false;
        }
    }
}
