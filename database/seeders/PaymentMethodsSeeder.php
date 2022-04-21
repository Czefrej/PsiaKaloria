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
            'donation_eligible'=>0,
            'active'=>1,
            'cod'=>1,
            'type'=>'cod',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('payment_methods')->insert([
            'name'=>'Przelew bankowy tradycyjny',
            'service_fee'=>17,
            'country'=>'PL',
            'donation_eligible'=>1,
            'active'=>1,
            'type'=>'traditional',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('payment_methods')->insert([
            'name'=>'PayU',
            'service_fee'=>17,
            'country'=>'PL',
            'donation_eligible'=>1,
            'active'=>0,
            'type'=>'p24',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('payment_methods')->insert([
            'name'=>'Przelewy24',
            'service_fee'=>17,
            'country'=>'PL',
            'donation_eligible'=>1,
            'active'=>1,
            'type'=>'p24',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('payment_methods')->insert([
            'name'=>'Karta płatnicza',
            'service_fee'=>17,
            'country'=>'PL',
            'donation_eligible'=>1,
            'active'=>1,
            'type'=>'card',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}
