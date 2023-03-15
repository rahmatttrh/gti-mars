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
         'name' => 'Material Cargo',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('types')->insert([
         'name' => 'Pessenger',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('types')->insert([
         'name' => 'Anchor Towing',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('types')->insert([
         'name' => 'Crew Change',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
