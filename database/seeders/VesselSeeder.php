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
         'status' => 1,
         'port_id' => 1,
         'name' => 'Elok Jaya',
         'prev_name' => '-',
         'imo' => '92313',
         'email' => 'ej@gmail.com',
         'telp' => '021323445',
         'require' => 'SCV',
         'type' => 'Anchor Handling Tug Supply',
         'flag' => 'Indonesia',
         'call_sign' => 'XYZ',
         'owner' => 'PT XYZ',
         'operator' => 'PHE',
         'portname' => 'Jakarta',
         'build' => '2004',
         'deck_cargo_capacity' => 500,
         'dpa_name' => 'Ahmad Juantoro',
         'dpa_telp' => '089991213131',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'status' => 1,
         'name' => 'Giat Jaya',
         'email' => 'gj@gmail.com',
         'type' => 'Anchor Handling Tug Supply',
         'require' => 'SCV',
         'telp' => '0899231314',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'Triton Jawara',
         'imo' => '4423424',
         'email' => 'tj@gmail.com',
         'require' => 'AHTS',
         'telp' => '0899231314',
         'type' => 'Tug Boat',
         'flag' => 'Indonesia',
         'deck_cargo_capacity' => 350,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      // DB::table('vessels')->insert([
      //    'status' => 1,
      //    'name' => 'Transko Balihe',
      //    'email' => 'tb@gmail.com',
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
         'email' => 'hj@gmail.com',
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
