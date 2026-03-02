<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('types')->insert([
         'name' => 'Cargo',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('types')->insert([
         'name' => 'Passenger',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('types')->insert([
         'name' => 'Towing',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('types')->insert([
         'name' => 'Moving',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
