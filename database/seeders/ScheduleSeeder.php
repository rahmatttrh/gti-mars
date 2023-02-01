<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
      $today = new Carbon('23-01-2023');

      DB::table('schedules')->insert([
         'type' => 2,
         'status' => 1,
         'origin_id' => 1,
         'jetty_id' => 1,
         'date' => $today,
         'func' => 'WOWS',
         'station' => 'C-225',
         'activity' => 'Towing Boat',
         'req_boat' => 'SVC',
         'docking' => '07:00:00',
         'departure' => '07:30:00',
         'destination_id' => 2,
         'arrival' => $today,
         'return' => $today,
         'remark' => 'Organik SBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('schedules')->insert([
         'type' => 2,
         'status' => 1,
         'origin_id' => 1,
         'jetty_id' => 1,
         'date' => $today->addDay(1),
         'func' => 'WOWS',
         'station' => 'C-222',
         'activity' => 'Mobilisasi Material from Pabelokan ex KJ4 (ESP WIDD-07 unit & etc...)',
         'docking' => '07:00:00',
         'departure' => '07:30:00',
         'destination_id' => 4,
         'arrival' => $today->addDay(1),
         'return' => $today->addDay(1),
         'remark' => 'Organik NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('schedules')->insert([
         'type' => 2,
         'status' => 2,
         'vessel_id' => 1,
         'origin_id' => 1,
         'jetty_id' => 1,
         'date' => $today->addDay(1),
         'func' => 'WOWS',
         'station' => 'C-4555',
         'activity' => 'Mobilisasi Supply',
         'docking' => '07:00:00',
         'departure' => '07:30:00',
         'destination_id' => 6,
         'arrival' => $today->addDay(1),
         'return' => $today->addDay(1),
         'remark' => 'Organik',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);




      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'status' => 1,
      //    'vessel_id' => 5,
      //    'origin_id' => 1,
      //    'jetty_id' => 1,
      //    'date' => NOW(),
      //    'docking' => '07:00:00',
      //    'departure' => '07:30:00',

      //    'destination_id' => 3,
      //    'arrival' => NOW(),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'status' => 1,
      //    'vessel_id' => 3,
      //    'origin_id' => 1,
      //    'jetty_id' => 1,
      //    'date' => NOW(),
      //    'docking' => '07:30:00',
      //    'departure' => '09:00:00',

      //    'destination_id' => 3,
      //    'arrival' => NOW(),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'status' => 1,
      //    'vessel_id' => 2,
      //    'origin_id' => 1,
      //    'jetty_id' => 1,
      //    'date' => NOW(),
      //    'docking' => '09:00:00',
      //    'departure' => '09:45:00',

      //    'destination_id' => 5,
      //    'arrival' => NOW(),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'status' => 1,
      //    'vessel_id' => 4,
      //    'origin_id' => 1,
      //    'jetty_id' => 1,
      //    'date' => NOW(),
      //    'docking' => '09:50:00',
      //    'departure' => '10:30:00',

      //    'destination_id' => 7,
      //    'arrival' => NOW(),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'status' => 1,
      //    'vessel_id' => 4,
      //    'origin_id' => 1,
      //    'jetty_id' => 2,
      //    'date' => NOW(),
      //    'docking' => '07:30:00',
      //    'departure' => '08:30:00',

      //    'destination_id' => 7,
      //    'arrival' => NOW(),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'vessel_id' => 2,
      //    'status' => 1,
      //    'origin_id' => 1,
      //    'destination_id' => 3,
      //    'departure' => NOW(),
      //    'arrival' => NOW(),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'vessel_id' => 1,
      //    'status' => 1,
      //    'origin_id' => 2,
      //    'destination_id' => 5,
      //    'departure' => NOW(),
      //    'arrival' => NOW(),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
   }
}
