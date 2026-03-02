<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityTypeSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('activity_types')->insert([
         'name' => 'Material Cargo',
         'desc' => 'logistic@gmail.com',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
