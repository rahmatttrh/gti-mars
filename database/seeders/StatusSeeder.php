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
         'class' => 'Cargo',
         'type' => 1,
         'code' => '01',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Accepted',
         'class' => 'Cargo',
         'type' => 2,
         'code' => '02',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Standby',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '03',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Loading Start',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '04',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Loading End',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '05',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Cast Off',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '06',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Fullaway',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '07',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Arrived',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '08',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Waiting',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '09',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Anchored at Secure Area',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '09',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Unloading Start',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '10',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Unloading End',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '11',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Task Complete',
         'class' => 'Cargo',
         'type' => 1,
         'code' => '12',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Confirmation Offloading',
         'class' => 'Cargo',
         'type' => 2,
         'code' => '13',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Add Additional Request',
         'class' => 'Cargo',
         'type' => 2,
         'code' => '14',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Approval Additional Request',
         'class' => 'Cargo',
         'type' => 2,
         'code' => '15',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Confirmation Complete',
         'class' => 'Cargo',
         'type' => 2,
         'code' => '16',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Add Deflection',
         'class' => 'Cargo',
         'type' => 2,
         'code' => '17',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Add Deviation',
         'class' => 'Cargo',
         'type' => 2,
         'code' => '18',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Confirm Deviation',
         'class' => 'Cargo',
         'type' => 2,
         'code' => '19',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('statuses')->insert([
         'name' => 'Confirm Deviation',
         'class' => 'Cargo',
         'type' => 2,
         'code' => '19',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);


      DB::table('statuses')->insert([
         'name' => 'Arrived',
         'class' => 'Moving',
         'type' => 1,
         'code' => '20',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Secure',
         'class' => 'Moving',
         'type' => 1,
         'code' => '20',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'PCSM',
         'class' => 'Moving',
         'type' => 1,
         'code' => '20',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Start Pickup Anchor',
         'class' => 'Moving',
         'type' => 1,
         'code' => '20',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      
      DB::table('statuses')->insert([
         'name' => 'Complete Pickup Anchor',
         'class' => 'Moving',
         'type' => 1,
         'code' => '20',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('statuses')->insert([
         'name' => 'Start Drop Anchor',
         'class' => 'Moving',
         'type' => 1,
         'code' => '20',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      
      DB::table('statuses')->insert([
         'name' => 'Complete Drop Anchor',
         'class' => 'Moving',
         'type' => 1,
         'code' => '20',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      
      DB::table('statuses')->insert([
         'name' => 'Under Tow',
         'class' => 'Moving',
         'type' => 1,
         'code' => '20',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      
   }
}
