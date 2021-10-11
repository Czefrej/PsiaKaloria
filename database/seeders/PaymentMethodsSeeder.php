<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'name'=>'Płatność przy odbiorze',
            'service_fee'=>17,
            'country'=>'PL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('payment_methods')->insert([
            'name'=>'Przelew bankowy tradycyjny',
            'service_fee'=>17,
            'country'=>'PL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('payment_methods')->insert([
            'name'=>'PayU',
            'service_fee'=>17,
            'country'=>'PL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('payment_methods')->insert([
            'name'=>'Przelewy24',
            'service_fee'=>17,
            'country'=>'PL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}
