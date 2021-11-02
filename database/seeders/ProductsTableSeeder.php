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
            'slug'=>'as-premium-z-wolowina-zestaw-10x1000g',
            'variant'=>'wołowina',
            'ean'=>'5904238002704',
            'sku'=>'as_premium_wol',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_premium_wol.jpg',
            'brand'=>'AS Premium',
            'regular_price'=>40.12,
            'gross_base_price'=>37.90,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'name'=>'Baton AS Premium z drobiem i wołowiną - 90% mięsa - Zestaw 10 x 1000g',
            'slug'=>'as-premium-z-drobiem-i-wolowina-zestaw-10x1000g',
            'variant'=>'drób i wołowina',
            'ean'=>'5904238002728',
            'sku'=>'as_premium_drob',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_premium_drob.jpg',
            'brand'=>'AS Premium',
            'regular_price'=>40.12,
            'gross_base_price'=>37.90,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'name'=>'Baton AS Premium z wieprzowiną i wołowiną - 90% mięsa - Zestaw 10 x 1000g',
            'slug'=>'as-premium-z-wieprzowina-i-wolowina-zestaw-10x1000g',
            'variant'=>'wieprzowina i wołowina',
            'ean'=>'5904238002711',
            'sku'=>'as_premium_wieprz',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_premium_wieprz.jpg',
            'brand'=>'AS Premium',
            'regular_price'=>40.12,
            'gross_base_price'=>37.90,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);


        //AS Deluxe
        DB::table('products')->insert([
            'name'=>'Baton AS Deluxe z jagnięciną - 85% mięsa - Zestaw 10 x 1000g',
            'slug'=>'as-deluxe-z-jagniecina-zestaw-10x1000g',
            'variant'=>'jagnięcina',
            'ean'=>'5904238002742',
            'sku'=>'as_deluxe_jag',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_deluxe_jag.jpg',
            'brand'=>'AS Deluxe',
            'regular_price'=>41.12,
            'gross_base_price'=>39.9,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'name'=>'Baton AS Deluxe z jagnięciną i wołowiną - 85% mięsa - Zestaw 10 x 1000g',
            'slug'=>'as-deluxe-z-jagniecina-i-wolowina-zestaw-10x1000g',
            'variant'=>'jagnięcina i wołowina',
            'ean'=>'5904238002759',
            'sku'=>'as_deluxe_jag_wol',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_deluxe_jag_wol.jpg',
            'brand'=>'AS Deluxe',
            'regular_price'=>41.12,
            'gross_base_price'=>39.9,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'name'=>'Baton AS Deluxe z indykiem - 85% mięsa - Zestaw 10 x 1000g',
            'slug'=>'as-deluxe-z-indykiem-zestaw-10x1000g',
            'variant'=>'indyk',
            'ean'=>'5904238002735',
            'sku'=>'as_deluxe_indyk',
            'description'=>'Lorem ipsum',
            'category'=>'sausage',
            'image'=>'/uploads/as_deluxe_indyk.jpg',
            'brand'=>'AS Deluxe',
            'regular_price'=>41.12,
            'gross_base_price'=>39.9,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>true,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        //AS BARF

        DB::table('products')->insert([
            'name'=>'AS - Mrożone Mięso Wołowo-Drobiowe Z Kością - Dieta BARF - 10kg',
            'slug'=>'as-barf-z-wolowina-i-drobiem-zestaw-10x1000g',
            'variant'=>'drób i wołowina',
            'ean'=>'5904238002766',
            'sku'=>'as_barf_drob_wol',
            'description'=>'Lorem ipsum',
            'category'=>'frozen_food',
            'image'=>'/uploads/as_barf_drob_wol.jpg',
            'brand'=>'AS BARF',
            'regular_price'=>59.71,
            'gross_base_price'=>55.99,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'name'=>'AS - Mrożone Mięso Wołowe - Dieta BARF - 10 kg',
            'slug'=>'as-barf-z-wolowina-10x1000g',
            'variant'=>'wołowina',
            'ean'=>'5904238002773',
            'sku'=>'as_barf_wol',
            'description'=>'Lorem ipsum',
            'category'=>'frozen_food',
            'image'=>'/uploads/as_barf_wol.jpg',
            'brand'=>'AS BARF',
            'regular_price'=>74.52,
            'gross_base_price'=>66.99,
            'tax'=>8,
            'weight'=>10.00,
            'donation_eligible'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}
