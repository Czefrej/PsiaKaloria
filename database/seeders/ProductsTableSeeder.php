<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //AS Premium
        DB::table('products')->insert([
            'name'=>'Baton AS Premium z wołowiną - 90% mięsa - Zestaw 10 x 1000g',
            'ean'=>'5904238002704',
            'sku'=>'as_premium_wol',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_premium_wol.jpg',
            'brand'=>'AS Premium',
            'gross_base_price'=>59.99,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'name'=>'Baton AS Premium z drobiem i wołowiną - 90% mięsa - Zestaw 10 x 1000g',
            'ean'=>'5904238002728',
            'sku'=>'as_premium_drob',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_premium_drob.jpg',
            'brand'=>'AS Premium',
            'gross_base_price'=>59.99,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'name'=>'Baton AS Premium z wieprzowiną i wołowiną - 90% mięsa - Zestaw 10 x 1000g',
            'ean'=>'5904238002711',
            'sku'=>'as_premium_wieprz',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_premium_wieprz.jpg',
            'brand'=>'AS Premium',
            'gross_base_price'=>59.99,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);


        //AS Deluxe
        DB::table('products')->insert([
            'name'=>'Baton AS Deluxe z jagnięciną - 85% mięsa - Zestaw 10 x 1000g',
            'ean'=>'5904238002742',
            'sku'=>'as_deluxe_jag',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_deluxe_jag.jpg',
            'brand'=>'AS Deluxe',
            'gross_base_price'=>59.99,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'name'=>'Baton AS Deluxe z jagnięciną i wołowiną - 85% mięsa - Zestaw 10 x 1000g',
            'ean'=>'5904238002759',
            'sku'=>'as_deluxe_jag_wol',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_deluxe_jag_wol.jpg',
            'brand'=>'AS Deluxe',
            'gross_base_price'=>59.99,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'name'=>'Baton AS Deluxe z indykiem - 85% mięsa - Zestaw 10 x 1000g',
            'ean'=>'5904238002735',
            'sku'=>'as_deluxe_indyk',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_deluxe_indyk.jpg',
            'brand'=>'AS Deluxe',
            'gross_base_price'=>59.99,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        //AS BARF

        DB::table('products')->insert([
            'name'=>'AS - Mrożone Mięso Wołowo-Drobiowe Z Kością - Dieta BARF - 10kg',
            'ean'=>'5904238002766',
            'sku'=>'as_barf_drob_wol',
            'description'=>'Lorem ipsum',
            'category'=>'frozen_food',
            'image'=>'/uploads/as_barf_drob_wol.jpg',
            'brand'=>'AS BARF',
            'gross_base_price'=>69.99,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'name'=>'AS - Mrożone Mięso Wołowe - Dieta BARF - 10 kg',
            'ean'=>'5904238002773',
            'sku'=>'as_barf_wol',
            'description'=>'Lorem ipsum',
            'category'=>'frozen_food',
            'image'=>'/uploads/as_barf_wol.jpg',
            'brand'=>'AS BARF',
            'gross_base_price'=>79.99,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}
