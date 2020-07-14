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
            'name' => "create_user" ]);

        Permission::create([
            'name' => "update_user"]);

        Permission::create([
            'name' => "delete_user" ]);

        Permission::create([
            'name' => "create_role" ]);

        Permission::create([
            'name' => "update_role"]);

        Permission::create([
            'name' => "delete_role" ]);
    }
}
