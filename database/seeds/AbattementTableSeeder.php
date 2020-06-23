<?php

use Illuminate\Database\Seeder;

class AbattementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('abattements')->insert([
            'nombre_charge' => "0",
            'pourcentage' => "0"
        ]);
        \Illuminate\Support\Facades\DB::table('abattements')->insert([
            'nombre_charge' => "1",
            'pourcentage' => "5"
        ]);
        \Illuminate\Support\Facades\DB::table('abattements')->insert([
            'nombre_charge' => "2",
            'pourcentage' => "10"
        ]);
        \Illuminate\Support\Facades\DB::table('abattements')->insert([
            'nombre_charge' => "3",
            'pourcentage' => "12"
        ]);
        \Illuminate\Support\Facades\DB::table('abattements')->insert([
            'nombre_charge' => "4",
            'pourcentage' => "13"
        ]);
        \Illuminate\Support\Facades\DB::table('abattements')->insert([
            'nombre_charge' => "5",
            'pourcentage' => "14"
        ]);
        \Illuminate\Support\Facades\DB::table('abattements')->insert([
            'nombre_charge' => "6",
            'pourcentage' => "15"
        ]);
        \Illuminate\Support\Facades\DB::table('abattements')->insert([
            'nombre_charge' => "7",
            'pourcentage' => "30"
        ]);
    }
}
