<?php

use Illuminate\Database\Seeder;

class VolumeHorairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('volume_horaires')->insert([
            'intitule' => "Semaine",
            'nbr_heure' => "40"
        ]);
        \Illuminate\Support\Facades\DB::table('volume_horaires')->insert([
            'intitule' => "Mois",
            'nbr_heure' => "173.33"
        ]);
    }
}
