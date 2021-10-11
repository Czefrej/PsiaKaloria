<?php

namespace Tests\Unit;

use App\Models\Product;

class DataManipulationTest extends \PHPUnit\Framework\TestCase
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

}
