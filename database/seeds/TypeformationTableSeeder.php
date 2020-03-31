<?php

use Illuminate\Database\Seeder;

class TypeformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('type_formations')->insert([
            'type_formation' => "Autres"
        ]);
        \Illuminate\Support\Facades\DB::table('type_formations')->insert([
            'type_formation' => "Formartion diplômante"
        ]);
        \Illuminate\Support\Facades\DB::table('type_formations')->insert([
            'type_formation' => "Renforcement de capacité"
        ]);
    }
}
