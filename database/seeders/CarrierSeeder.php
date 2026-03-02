<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrierSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('carriers')->insert([
         'name' => 'Truck',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('carriers')->insert([
         'name' => 'Ship',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('carriers')->insert([
         'name' => 'Plane',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
