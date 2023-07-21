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
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Standby',
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Loading Start',
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Loading End',
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Cast Off',
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Fullaway',
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Arrived',
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Waiting',
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Unloading Start',
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Unloading End',
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Task Complete',
         'type' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Confirmation Offloading',
         'type' => 2,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Add Additional Request',
         'type' => 2,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Approval Additional Request',
         'type' => 2,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Confirmation Complete',
         'type' => 2,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
