<?php

namespace Database\Seeders;

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
      // \App\Models\User::factory(10)->create();
      $this->call([
         RoleSeeder::class,
         UserSeeder::class,
         VesselSeeder::class,
         PortSeeder::class,
         ScheduleSeeder::class,
         LogisticSeeder::class,
         JettySeeder::class,
         PlatformSeeder::class,
         PartySeeder::class,
         CarrierSeeder::class,
         DepartmentSeeder::class,
         TypeSeeder::class,
         ActivitySeeder::class
      ]);
   }
}
