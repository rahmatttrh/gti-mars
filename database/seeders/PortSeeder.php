<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('ports')->insert([
         'name' => 'Cinta-T',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Widuri-T',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Intan Area',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Farida',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Krisna-P',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'PAB',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Rama-H',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Krinsa-E',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Aida-A',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Zelda-E',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
