<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('schedules')->insert([
         'vessel_id' => 2,
         'status' => 1,
         'origin_id' => 1,
         'destination_id' => 3,
         'departure' => NOW(),
         'arrival' => NOW(),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
