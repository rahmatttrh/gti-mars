<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartySeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('parties')->insert([
         'name' => 'Indofood',
         'platform_id' => 1,
         'email' => 'indofood@gmail.com',
         'tagline' => 'Lorem, ipsum dolor.',
         'type' => 2,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('parties')->insert([
         'name' => 'Unilever',
         'platform_id' => 1,
         'email' => 'unilever@gmail.com',
         'type' => 2,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('parties')->insert([
         'name' => 'Kalbe',
         'platform_id' => 2,
         'email' => 'kalbe@gmail.com',
         'type' => 2,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('parties')->insert([
         'name' => 'Gemilang Logistic',
         'platform_id' => 1,
         'email' => 'gemilang@gmail.com',
         'type' => 3,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('parties')->insert([
         'name' => 'Intan Area',
         'platform_id' => 1,
         'email' => 'intan@gmail.com',
         'type' => 4,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('parties')->insert([
         'name' => 'Krisna',
         'platform_id' => 2,
         'email' => 'krisna@gmail.com',
         'type' => 4,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
