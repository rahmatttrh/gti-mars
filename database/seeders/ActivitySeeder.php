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
         'name' => 'Mobilize material from Jakarta ( Chemical stimulasi -  4 Plt )',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 1,
         'name' => 'Backload material ( Material drilling, etc )',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('activities')->insert([
         'type_id' => 3,
         'name' => 'Towing Boat ( WIDD p/f- INTANB  p/f)',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
