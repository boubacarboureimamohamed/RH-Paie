<?php

use Illuminate\Database\Seeder;

class ImpotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('impots')->insert([
            'minimum' => "1",
            'maximum' => "25000",
            'taux' => "1"
        ]);
        \Illuminate\Support\Facades\DB::table('impots')->insert([
            'minimum' => "25001",
            'maximum' => "50000",
            'taux' => "2"
        ]);
        \Illuminate\Support\Facades\DB::table('impots')->insert([
            'minimum' => "50001",
            'maximum' => "100000",
            'taux' => "6"
        ]);
        \Illuminate\Support\Facades\DB::table('impots')->insert([
            'minimum' => "100001",
            'maximum' => "150000",
            'taux' => "13"
        ]);
        \Illuminate\Support\Facades\DB::table('impots')->insert([
            'minimum' => "150001",
            'maximum' => "300000",
            'taux' => "25"
        ]);
        \Illuminate\Support\Facades\DB::table('impots')->insert([
            'minimum' => "300001",
            'maximum' => "400000",
            'taux' => "30"
        ]);
        \Illuminate\Support\Facades\DB::table('impots')->insert([
            'minimum' => "400001",
            'maximum' => "700000",
            'taux' => "32"
        ]);
        \Illuminate\Support\Facades\DB::table('impots')->insert([
            'minimum' => "700001",
            'maximum' => "1000000",
            'taux' => "34"
        ]);
        \Illuminate\Support\Facades\DB::table('impots')->insert([
            'minimum' => "1000001",
            'maximum' => "5000000",
            'taux' => "35"
        ]);
    }
}
