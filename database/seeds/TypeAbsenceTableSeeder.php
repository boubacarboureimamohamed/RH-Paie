<?php

use Illuminate\Database\Seeder;

class TypeAbsenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Payée"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Non Payée"
        ]);
    }
}
