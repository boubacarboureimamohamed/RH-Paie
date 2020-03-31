<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname' => "BOUBACAR BOUREIMA",
            'secondname' => "Mohamed",
            'email' => "mohamed@gmail.com",
            'password' => Hash::make('1409970055')
        ]);

        $role = Role::firstOrcreate(['name'=>'Admin']);
        $role->syncPermissions(Permission::all(['id'])->toArray());
        $user->assignRole($role);
    }
}
