<?php

namespace Database\Seeders;

use App\Models\Crew;
use App\Models\PayloadType;
use App\Models\ScheduleVessel;
use App\Models\VdrHseHeader;
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
         RouteTypeSeeder::class,
         PortSeeder::class,
         // ScheduleSeeder::class,
         LogisticSeeder::class,
         JettySeeder::class,
         PlatformSeeder::class,
         PartySeeder::class,
         CarrierSeeder::class,
         DepartmentSeeder::class,
         TypeSeeder::class,
         ActivitySeeder::class,
         PayloadTypeSeeder::class,
         WoSeeder::class,
         CargoSeeder::class,
         EmployeeSeeder::class,
         StatusSeeder::class,
         ScheduleVesselSeeder::class,
         VdrCargoHeadingSeeder::class,
         VdrWeatherHeadingSeeder::class,
         VdrHseHeaderSeeder::class,
         VdrEngineHeadingSeeder::class,
         // VesselStatusSeeder::class
      ]);

      Crew::factory(30)->create();
   }
}
