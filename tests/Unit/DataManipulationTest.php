<?php

namespace Tests\Unit;

use App\Models\DeliveryMethod;
use App\Models\PaymentMethod;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class DataManipulationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_tax_id()
    {
        $tax_id = "719122123";

        $p_tax_id = convertToPhone("719 122 123");
        $this->assertEquals($tax_id,$p_tax_id);

        $p_tax_id = convertToPhone("719-122-123");
        $this->assertEquals($tax_id,$p_tax_id);

        $p_tax_id = convertToPhone("719 -122-123");
        $this->assertEquals($tax_id,$p_tax_id);

        $p_tax_id = convertToPhone("719122-123");
        $this->assertEquals($tax_id,$p_tax_id);

        $p_tax_id = convertToPhone("719122123");
        $this->assertEquals($tax_id,$p_tax_id);
    }

    public function test_phone()
    {
        $phone = "+48719122123";

        $p_phone = convertToPhone("+48719 122 123");
        $this->assertEquals($p_phone,$phone);

        $p_phone = convertToPhone("+48719-122-123");
        $this->assertEquals($p_phone,$phone);

        $p_phone = convertToPhone("+48 719122-123");
        $this->assertEquals($p_phone,$phone);

        $phone = "+48123345567";
        $p_phone = convertToPhone("+48 123 345 567");
        $this->assertEquals($p_phone,$phone);
    }

    public function test_name()
    {
        $name = "Elżbieta Anna Michalska-Jeżyna";

        $p_name = convertToName("Elżbieta anna michalska-Jeżyna");
        $this->assertEquals($name,$p_name);

        $p_name = convertToName("Elżbieta anna michaLska-jeżyna");
        $this->assertEquals($name,$p_name);

        $p_name = convertToName("ELŻBIETA ANNA MICHALSKA-JEŻYNA");
        $this->assertEquals($name,$p_name);

        $p_name = convertToName("elżbieta anna michalska-jeżyna");
        $this->assertEquals($name,$p_name);

        $name = "Elżbieta Anna";
        $p_name = convertToName("elżbieta anna");
        $this->assertEquals($name,$p_name);

        $name = "Elżbieta";
        $p_name = convertToName("elżbieta");
        $this->assertEquals($name,$p_name);
    }

    public function test_address()
    {
        $name = "Puławska 99";

        $p_name = convertToName("Puławska 99");
        $this->assertEquals($name,$p_name);

        $p_name = convertToName("puławska 99");
        $this->assertEquals($name,$p_name);

        $p_name = convertToName("puławska 99");
        $this->assertEquals($name,$p_name);

        $name = "Gen. Józefa Piłsudzkiego 32";

        $p_name = convertToName("gen. józefa piłsudzkiego 32");
        $this->assertEquals($name,$p_name);

        $name = "Nowy Gród";

        $p_name = convertToName("nowy gród");
        $this->assertEquals($name,$p_name);

    }

    public function testFind(){
        $product = Product::where('sku',"as_barf_wol")->first();
        $this->assertEquals($product->category,'sausage');
    }

    public function testBaselinker(){
        $payment = PaymentMethod::where('cod',0)->first();
        $delivery = DeliveryMethod::find(3);
        $product = Product::where('sku',"as_barf_wol")->first();



        App::call('App\Http\Controllers\BaselinkerController@newOrder',[
            'payment'=>$payment
            ,'delivery'=>$delivery
            ,'email'=>'jeffery@outerbest.pl',
            'phone'=>"507632650",
            'login'=>'karma-as',
            'delivery_price'=>32.50,
            'user_comments'=>"Brak",
            'd_fullname'=>"Wiktor Jeffery",
            'd_company'=>'',
            'd_address'=>'Puławska 99',
            'd_postcode'=>'24-100',
            'd_country_code'=>'PL',
            'd_city'=>'Gołąb',
            'd_point_id'=>'WRO3041',
            'd_point_name'=>'Packzomat fajnu',
            'd_point_address'=>'Gwizdnięta 34',
            'd_point_postcode'=>'24-100',
            'd_point_city'=>'Szamotuły',
            'invoice_fullname'=>'Wiktor Jeffery',
            'invoice_company'=>'FHU AS Maria Jeffery',
            'invoice_nip'=>'7161571935',
            'invoice_address'=>'Puławska 99',
            'invoice_postcode'=>'24-100',
            'invoice_city'=>'Warsaw',
            'invoice_country_code'=>'PL',
            'company_purchase'=>true,'products'=>[$product]]);
    }

}
