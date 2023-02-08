<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_methods')->insert([
            'name' => 'Kurier DPD',
            'gross_price_per_package' => 17,
            'max_package_weight' => 31,
            'free_delivery_threshold' => 150,
            'country' => 'PL',
            'donation_eligible' => 1,
            'active' => 1,
            'thumbnail' => 'images/dpd.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('delivery_methods')->insert([
            'name' => 'Paczkomaty InPost',
            'gross_price_per_package' => 17,
            'max_package_weight' => 25,
            'free_delivery_threshold' => 150,
            'country' => 'PL',
            'donation_eligible' => 0,
            'active' => 1,
            'thumbnail' => 'images/inpos.svg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('delivery_methods')->insert([
            'name' => 'Kurier InPost',
            'gross_price_per_package' => 17,
            'max_package_weight' => 31,
            'free_delivery_threshold' => 150,
            'country' => 'PL',
            'donation_eligible' => 1,
            'active' => 1,
            'thumbnail' => 'images/inpos2.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('delivery_methods')->insert([
            'name' => 'Allegro Smart Paczkomaty InPost',
            'gross_price_per_package' => 17,
            'max_package_weight' => 25,
            'free_delivery_threshold' => 150,
            'country' => 'PL',
            'donation_eligible' => 0,
            'active' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('delivery_methods')->insert([
            'name' => 'Allegro Smart Kurier DPD',
            'gross_price_per_package' => 17,
            'max_package_weight' => 31,
            'free_delivery_threshold' => 150,
            'country' => 'PL',
            'donation_eligible' => 0,
            'active' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('delivery_methods')->insert([
            'name' => 'Allegro Smart Kurier InPost',
            'gross_price_per_package' => 17,
            'max_package_weight' => 31,
            'free_delivery_threshold' => 150,
            'country' => 'PL',
            'donation_eligible' => 0,
            'active' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('delivery_methods')->insert([
            'name' => 'Odbiór osobisty',
            'gross_price_per_package' => 0,
            'max_package_weight' => 0,
            'free_delivery_threshold' => 150,
            'country' => 'PL',
            'donation_eligible' => 0,
            'active' => 1,
            'thumbnail' => 'images/home.svg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
