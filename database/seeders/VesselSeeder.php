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
         'name' => 'Elok Jaya',
         'imo' => '92313',
         'type' => 'Anchor Handling Tug Supply',
         'flag' => 'Indonesia',
         'deck_cargo_capacity' => 500,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'name' => 'Triton Jawara',
         'imo' => '4423424',
         'type' => 'Tug Boat',
         'flag' => 'Indonesia',
         'deck_cargo_capacity' => 350,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'name' => 'Transko Balihe',
         'type' => 'Anchor Handling Tug Supply',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'name' => 'Logindo Overcomer',
         'type' => 'Anchor Handling Tug Supply',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'name' => 'Hafar Jupiter',
         'type' => 'Tug Boat',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'name' => 'Peteka 5401',
         'type' => 'Anchor Handling Tug Supply',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'name' => 'Transko Moloko',
         'type' => 'Anchor Handling Tug Supply',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'name' => 'Giat Jaya',
         'type' => 'Anchor Handling Tug Supply',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'name' => 'ENC One',
         'type' => 'Patrol',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'name' => 'ENC Rhayden',
         'type' => 'Anchor Handling Tug Supply',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('vessels')->insert([
         'name' => 'Mitra Anugerah 35',
         'type' => 'Tug Boat',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
