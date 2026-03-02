<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VesselStatusSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('vessel_statuses')->insert([
         'name' => 'Assign',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessel_statuses')->insert([
         'name' => 'Standby',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessel_statuses')->insert([
         'name' => 'Loading Start',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessel_statuses')->insert([
         'name' => 'Loading Complete',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessel_statuses')->insert([
         'name' => 'Cast Off',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessel_statuses')->insert([
         'name' => 'Fullaway',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessel_statuses')->insert([
         'name' => 'Arrived',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessel_statuses')->insert([
         'name' => 'Waiting',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessel_statuses')->insert([
         'name' => 'Unloading Start',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessel_statuses')->insert([
         'name' => 'Unloading Complete',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessel_statuses')->insert([
         'name' => 'Task Complete',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
