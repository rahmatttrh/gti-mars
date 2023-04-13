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
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Mobilize material',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Backload material',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Mobilisasi next well material',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Equipment mobilization',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Equipment demobilization',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Bunker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Backload cargo',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Distribute cargo',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Pickup general cargo',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 3,
         'name' => 'Towing Boat',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 3,
         'name' => 'Moving Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
