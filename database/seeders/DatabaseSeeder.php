<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        $this->call([
//            DeliveryMethodsSeeder::class,
//            PaymentMethodsSeeder::class,
//            ProductsTableSeeder::class,
//            DeliveryPaymentsSeeder::class,
//            ShelterSeeder::class
//        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'jeffery@outerbest.pl',
            'password' => bcrypt('@7$$sY5ymeGJ'),
            'role' => 'admin'
        ]);
    }
}
