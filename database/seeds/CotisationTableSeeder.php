<?php

use Illuminate\Database\Seeder;

class CotisationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('cotisations')->insert([
            'taux_cnss_employe_national' => "5.25",
            'plafond_cnss_employe_national' => "500000",
            'taux_cnss_employe_expatrie' => "6",
            'plafond_cnss_employe_expatrie' => "500000",
            'taux_cnss_employeur' => "16.5",
            'plafond_cnss_employeur' => "500000",
            'taux_anpe' => "0.5",
            'plafond_anpe' => "500000"
        ]);
    }
}
