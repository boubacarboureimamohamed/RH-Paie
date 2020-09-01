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
            'type_absence' => "Congé Annuel Sans Solde"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Congé Annuel Payée"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Congé De Maladie"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Congé De Maternité"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Permission Sans Solde"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Permission Payée"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Abandon De Poste"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Indisponibilité"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Suspendu"
        ]);
    }
}
