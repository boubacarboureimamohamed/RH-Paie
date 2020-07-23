<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AbattementTableSeeder::class);
         $this->call(CotisationTableSeeder::class);
         $this->call(ImpotTableSeeder::class);
         $this->call(PermissionsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(TypeformationTableSeeder::class);
         $this->call(TypechargeTableSeeder::class);
         $this->call(TypecongeTableSeeder::class);
         $this->call(ModepaiementTableSeeder::class);
    }
}
