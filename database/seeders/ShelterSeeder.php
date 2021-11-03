<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_shelters')->insert([
            'name'=>'Stowarzyszenie Przyjaciół Zwierząt "AZYL"',
            'address'=>'Olszowa 4',
            'phone'=>'609118027',
            'email'=>'schroniskobialapodlaska@o2.pl',
            'postal_code'=> '21-500',
            'city'=>'Biała Podlaska',
            'country'=>'PL',
            'dogs_amount'=>50,
            'cats_amount'=>50,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('animal_shelters')->insert([
            'name'=>'Schronisko Dla Bezdomnych Zwierząt w Józefowie',
            'address'=>'Strużańska 15',
            'phone'=>'694642098',
            'email'=>'biuro@schroniskojozefow.pl',
            'postal_code'=> '05-119',
            'city'=>'Józefów',
            'country'=>'PL',
            'dogs_amount'=>50,
            'cats_amount'=>50,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
