<?php

use Illuminate\Database\Seeder;

class NationalitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('nationalites')->insert([
            'nationalite' => "Nigeriénne"
        ]);
        \Illuminate\Support\Facades\DB::table('nationalites')->insert([
            'nationalite' => "Nigeriane"
        ]);
        \Illuminate\Support\Facades\DB::table('nationalites')->insert([
            'nationalite' => "Ivoirienne"
        ]);
        \Illuminate\Support\Facades\DB::table('nationalites')->insert([
            'nationalite' => "Togolaise"
        ]);
        \Illuminate\Support\Facades\DB::table('nationalites')->insert([
            'nationalite' => "Sénegalaise"
        ]);
    }
}
