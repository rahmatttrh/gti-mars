<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      // DB::table('activities')->insert([
      //    'type_id' => 1,
      //    'name' => 'Mobilize Material',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('activities')->insert([
      //    'type_id' => 1,
      //    'name' => 'Backload Material',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('activities')->insert([
      //    'type_id' => 1,
      //    'name' => 'Equipment Mobilization',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('activities')->insert([
      //    'type_id' => 1,
      //    'name' => 'Equipment Demobilization',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('activities')->insert([
      //    'type_id' => 1,
      //    'name' => 'Bunker',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('activities')->insert([
      //    'type_id' => 1,
      //    'name' => 'Cargo',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Cargo',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 2,
         'name' => 'Crew',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      
      DB::table('activities')->insert([
         'type_id' => 4,
         'name' => 'Moving Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('activities')->insert([
         'type_id' => 4,
         'name' => 'Lifting',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('activities')->insert([
         'type_id' => 4,
         'name' => 'Anchor Job',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);


      // DB::table('activities')->insert([
      //    'type_id' => 2,
      //    'name' => 'Crew Change',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('activities')->insert([
      //    'type_id' => 4,
      //    'name' => 'Survei',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
   }
}
