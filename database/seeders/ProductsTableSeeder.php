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

        DB::table('tax_groups')->insert([
            'tax_group'=>'PET_FOOD_WET',
            'country_code'=>'DE',
            'percent_rate'=>7,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('tax_groups')->insert([
            'tax_group'=>'PET_FOOD_WET',
            'country_code'=>'PL',
            'percent_rate'=>8,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('tax_groups')->insert([
            'tax_group'=>'PET_FOOD_WET',
            'country_code'=>'NL',
            'percent_rate'=>21,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('tax_groups')->insert([
            'tax_group'=>'PET_FOOD_WET',
            'country_code'=>'DK',
            'percent_rate'=>25,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('tax_groups')->insert([
            'tax_group'=>'PET_FOOD_WET',
            'country_code'=>'SK',
            'percent_rate'=>10,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        //PRODUCTS

        DB::table('products')->insert([
            'sku'=>'as_premium_wol',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnimeal_beef_10',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnimeal_pork_10',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnimeal_beef_3',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 3,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnimeal_pork_3',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 3,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'as_premium_wieprz',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'as_premium_drob',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnimeal_beef',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnimeal_pork',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'as_barf_drob_wol',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'as_barf_wol',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'as_deluxe_indyk',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'as_deluxe_jag',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'as_deluxe_jag_wol',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 10,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnione_beef_410g_5',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 5*0.410,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnione_beef_410g',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 0.41,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnione_deer_410g_5',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 5*0.410,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnione_deer_410g',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 0.41,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnione_beef_850g_5',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 5*0.850,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnione_beef_850g',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 0.85,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnione_deer_850g_5',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 5*0.85,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'sku'=>'carnione_deer_850g',
            'net_cogs'=>40.12,
            'net_packaging_price'=>37.90,
            'weight' => 0.85,
            'tax_group'=>'PET_FOOD_WET',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);




    }
}
