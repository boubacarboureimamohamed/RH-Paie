<?php

use Illuminate\Database\Seeder;

class TypeabsenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Autres"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Abandon de poste"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Indisponibilités"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Suspendu"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Permission Payée"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "permission sans solde"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Mise en position de stage professionnel"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Congé de maladie"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Congé de maternité"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Congé annuel payé"
        ]);
        \Illuminate\Support\Facades\DB::table('type_absences')->insert([
            'type_absence' => "Congé annuel sans solde"
        ]);
    }
}
