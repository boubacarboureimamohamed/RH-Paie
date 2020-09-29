<?php

use Illuminate\Database\Seeder;

class AbattementsProfsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('abattements_profs')->insert([
            'libelle' => "Abattement Professionnel",
            'pourcentage' => "13"
        ]);
    }
}
