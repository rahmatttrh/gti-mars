<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VesselSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('vessels')->insert([
         'status' => 0,
         // 'port_id' => 1,
         'name' => 'Elok Jaya',
         'prev_name' => '-',
         'imo' => '92313',
         'email' => 'ej@pertamina.com',
         'telp' => '021323445',
         'require' => 'SCV',
         'type' => 'Anchor Handling Tug Supply',
         'flag' => 'Indonesia',
         'call_sign' => 'XYZ',
         'owner' => 'PT XYZ',
         'operator' => 'PHE',
         'portname' => 'Jakarta',
         'build' => '2004',
         'deckcapacity' => 500,
         'deckspace' => 30,
         'deadweight' => 3.00,
         'dpa_name' => 'Ahmad Juantoro',
         'dpa_telp' => '089991213131',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'Giat Jaya',
         'email' => 'gj@pertamina.com',
         'type' => 'Anchor Handling Tug Supply',
         'require' => 'SCV',
         'telp' => '0899231314',
         'deckcapacity' => 500,
         'deckspace' => 30,
         'deadweight' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'Triton Jawara',
         'imo' => '4423424',
         'email' => 'tj@pertamina.com',
         'require' => 'AHTS',
         'telp' => '0899231314',
         'type' => 'Tug Boat',
         'flag' => 'Indonesia',
         'deckcapacity' => 350,
         'deckspace' => 15,
         'deadweight' => 2.00,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      // DB::table('vessels')->insert([
      //    'status' => 1,
      //    'name' => 'Transko Balihe',
      //    'email' => 'tb@pertamina.com',
      //    'type' => 'Anchor Handling Tug Supply',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('vessels')->insert([
      //    'status' => 1,
      //    'name' => 'Logindo Overcomer',
      //    'type' => 'Anchor Handling Tug Supply',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      DB::table('vessels')->insert([
         'status' => 1,
         'name' => 'Hafar Jupiter',
         'type' => 'Tug Boat',
         'email' => 'hj@pertamina.com',
         'deckspace' => 23,
         'deadweight' => 2.5,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      // DB::table('vessels')->insert([
      //    'status' => 1,
      //    'name' => 'Peteka 5401',
      //    'type' => 'Anchor Handling Tug Supply',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('vessels')->insert([
      //    'status' => 1,
      //    'name' => 'Transko Moloko',
      //    'type' => 'Anchor Handling Tug Supply',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('vessels')->insert([
      //    'status' => 1,
      //    'name' => 'ENC One',
      //    'type' => 'Patrol',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('vessels')->insert([
      //    'status' => 1,
      //    'name' => 'ENC Rhayden',
      //    'type' => 'Anchor Handling Tug Supply',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('vessels')->insert([
      //    'status' => 1,
      //    'name' => 'Mitra Anugerah 35',
      //    'type' => 'Tug Boat',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
   }
}
