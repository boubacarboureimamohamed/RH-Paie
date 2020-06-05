<?php

use Illuminate\Database\Seeder;

class TypecongeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('type_conges')->insert([
            'type_conge' => "Suspendu"
        ]);
        \Illuminate\Support\Facades\DB::table('type_conges')->insert([
            'type_conge' => "Congé De Maladie"
        ]);
        \Illuminate\Support\Facades\DB::table('type_conges')->insert([
            'type_conge' => "Congé De Maternité"
        ]);
        \Illuminate\Support\Facades\DB::table('type_conges')->insert([
            'type_conge' => "Congé Annuel Payé"
        ]);
        \Illuminate\Support\Facades\DB::table('type_conges')->insert([
            'type_conge' => "Congé Annuel Sans Solde"
        ]);
    }
}
