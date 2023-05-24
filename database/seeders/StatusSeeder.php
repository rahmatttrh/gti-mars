<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('statuses')->insert([
         'name' => 'Assigned',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Standby',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Loading Start',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Loading End',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Cast Off',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Fullaway',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Arrived',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Waiting',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Unloading Start',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Unloading End',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Task Complete',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
