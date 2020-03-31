<?php

use Illuminate\Database\Seeder;

class ModepaiementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('mode_paiements')->insert([
            'mode_paiement' => "Virement"
        ]);
        \Illuminate\Support\Facades\DB::table('mode_paiements')->insert([
            'mode_paiement' => "Chèque"
        ]);
        \Illuminate\Support\Facades\DB::table('mode_paiements')->insert([
            'mode_paiement' => "Espèce"
        ]);
    }
}
