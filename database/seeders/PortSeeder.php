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
         'name' => 'KJ4',
         'latitude' => '213218373',
         'longitude' => '9839731',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'KJ2',
         'latitude' => '213218373',
         'longitude' => '9839731',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Cinta-T',
         'latitude' => '213218373',
         'longitude' => '9839731',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Widuri-T',
         'latitude' => '34254353',
         'longitude' => '9839731',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Intan Area',
         'latitude' => '7612313',
         'longitude' => '927313334',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Farida',
         'latitude' => '34254353',
         'longitude' => '9839731',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Krisna-P',
         'latitude' => '213218373',
         'longitude' => '432342555',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'PAB',
         'latitude' => '7612313',
         'longitude' => '927313334',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Rama-H',
         'latitude' => '34254353',
         'longitude' => '9839731',
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
