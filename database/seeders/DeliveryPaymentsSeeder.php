<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryPaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>1,
            'payment_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>1,
            'payment_id'=>2,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>1,
            'payment_id'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>1,
            'payment_id'=>4,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>2,
            'payment_id'=>2,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>2,
            'payment_id'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>2,
            'payment_id'=>4,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>3,
            'payment_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>3,
            'payment_id'=>2,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>3,
            'payment_id'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>3,
            'payment_id'=>4,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>4,
            'payment_id'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>4,
            'payment_id'=>4,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>5,
            'payment_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>5,
            'payment_id'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>5,
            'payment_id'=>4,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>6,
            'payment_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>6,
            'payment_id'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('delivery_payment_availability')->insert([
            'delivery_id'=>6,
            'payment_id'=>4,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
