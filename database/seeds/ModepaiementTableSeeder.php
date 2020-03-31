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
            'modepaiement' => "Virement"
        ]);
        \Illuminate\Support\Facades\DB::table('mode_paiements')->insert([
            'modepaiement' => "Chèque"
        ]);
        \Illuminate\Support\Facades\DB::table('mode_paiements')->insert([
            'modepaiement' => "Espèce"
        ]);
    }
}
