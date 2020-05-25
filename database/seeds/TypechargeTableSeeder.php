<?php

use Illuminate\Database\Seeder;

class TypechargeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('type_charges')->insert([
            'type_charge' => "Conjoint(es)"
        ]);
        \Illuminate\Support\Facades\DB::table('type_charges')->insert([
            'type_charge' => "Enfant(s)"
        ]);
    }
}
