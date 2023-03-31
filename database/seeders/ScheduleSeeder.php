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
      $date = new Carbon('23-01-2023');
      $now = Carbon::now();

      DB::table('schedules')->insert([
         // 'type_id' => 1,
         'type' => 2,
         'status' => 1,
         'date' => $now,
         'vessel_id' => 1,
         'origin_id' => 1,
         'destination_id' => 6,
         'departure_estimasi' => $now->addHour(2),
         'arrive_estimasi' => $now->addHour(6),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('schedules')->insert([
         // 'type_id' => 2,
         'type' => 2,
         'status' => 1,
         'date' => $now->addDay(1),
         'vessel_id' => 2,
         'origin_id' => 1,
         'destination_id' => 3,
         'departure_estimasi' => $now->addDay(1)->addHour(1),
         'arrive_estimasi' => $now->addDay(1)->addHour(4),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('schedules')->insert([
         // 'type_id' => 2,
         'type' => 2,
         'status' => 1,
         'date' => $now->addDay(3),
         'vessel_id' => 4,
         'origin_id' => 1,
         'destination_id' => 5,
         'departure_estimasi' => $now->addDay(3)->addHour(1),
         'arrive_estimasi' => $now->addDay(3)->addHour(5),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'status' => 1,
      //    'origin_id' => 1,
      //    'jetty_id' => 1,
      //    'date' => $date->addDay(1),
      //    'func' => 'WOWS',
      //    'station' => 'C-222',
      //    'activity' => 'Mobilisasi Material from Pabelokan ex KJ4 (ESP WIDD-07 unit & etc...)',
      //    'req_boat' => 'SVC',
      //    'docking' => '07:00:00',
      //    'departure' => '07:30:00',
      //    'destination_id' => 4,
      //    'arrival' => $date->addDay(1),
      //    'return' => $date->addDay(1),
      //    'remark' => 'Organik NBU',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'status' => 2,
      //    'vessel_id' => 1,
      //    'origin_id' => 1,
      //    'jetty_id' => 1,
      //    'date' => $date->addDay(1),
      //    'func' => 'WOWS',
      //    'station' => 'C-455',
      //    'activity' => 'Mobilisasi Supply',
      //    'req_boat' => 'SVC',
      //    'docking' => '07:00:00',
      //    'departure' => '07:30:00',
      //    'destination_id' => 6,
      //    'arrival' => $date->addDay(1),
      //    'return' => $date->addDay(1),
      //    'remark' => 'Organik',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'status' => 1,
      //    'origin_id' => 1,
      //    'jetty_id' => 1,
      //    'date' => $now,
      //    'func' => 'WOWS',
      //    'station' => 'C-767',
      //    'activity' => 'Mobilisasi Crew',
      //    'req_boat' => 'SVC',
      //    'docking' => '07:00:00',
      //    'departure' => '07:30:00',
      //    'destination_id' => 5,
      //    'arrival' => $now,
      //    'return' => $now,
      //    'remark' => 'Organik',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'status' => 2,
      //    'vessel_id' => 3,
      //    'origin_id' => 1,
      //    'jetty_id' => 2,
      //    'date' => $now->addDay(2),
      //    'func' => 'WOWS',
      //    'station' => 'C-767',
      //    'activity' => 'ESP unit Reda Farida-C 14',
      //    'req_boat' => 'SVC',
      //    'docking' => '07:00:00',
      //    'departure' => '07:30:00',
      //    'destination_id' => 2,
      //    'arrival' => $now->addDay(2),
      //    'return' => $now->addDay(2),
      //    'remark' => 'Organik Example',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('schedules')->insert([
      //    'type' => 2,
      //    'status' => 2,
      //    'vessel_id' => 10,
      //    'origin_id' => 1,
      //    'jetty_id' => 2,
      //    'date' => $now->addDay(5),
      //    'func' => 'WOWS',
      //    'station' => 'C-767',
      //    'activity' => 'Back Load Pulling Tool Powerlift ',
      //    'req_boat' => 'SVC',
      //    'docking' => '07:00:00',
      //    'departure' => '07:30:00',
      //    'destination_id' => 12,
      //    'arrival' => $now->addDay(5),
      //    'return' => $now->addDay(5),
      //    'remark' => 'Organik Example',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);






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
