<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => "creer_user" ]);

        Permission::create([
            'name' => "editer_user"]);

        Permission::create([
            'name' => "supprimer_user" ]);

        Permission::create([
            'name' => "creer_role" ]);

        Permission::create([
            'name' => "editer_role"]);

        Permission::create([
            'name' => "supprimer_role" ]);
    }
}
