<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('ranks')->insert([
         'name' => 'Master',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ranks')->insert([
         'name' => 'Chief Officer',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ranks')->insert([
         'name' => '2nd Officer',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ranks')->insert([
         'name' => 'Chief Engineer',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ranks')->insert([
         'name' => '2nd Engineer',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ranks')->insert([
         'name' => '3rd Engineer',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ranks')->insert([
         'name' => 'Oiler',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ranks')->insert([
         'name' => 'AB',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
