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
         'email' => 'kj4@gmail.com',
         'type' => 'LOC',
         'latitude' => '213218373',
         'longitude' => '9839731',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'KJ2',
         'email' => 'kj2@gmail.com',
         'type' => 'LOC',
         'latitude' => '213218373',
         'longitude' => '9839731',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Cinta',
         'email' => 'cinta@gmail.com',
         'type' => 'CBU',
         'latitude' => '213218373',
         'longitude' => '9839731',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Widuri',
         'email' => 'widuri@gmail.com',
         'type' => 'SBU',
         'latitude' => '34254353',
         'longitude' => '9839731',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'Intan Area',
         'email' => 'intan@gmail.com',
         'type' => 'SBU',
         'latitude' => '7612313',
         'longitude' => '927313334',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'name' => 'PAB',
         'email' => 'pab@gmail.com',
         'type' => 'NBU',
         'latitude' => '7612313',
         'longitude' => '927313334',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      // DB::table('ports')->insert([
      //    'name' => 'Rama-H',
      //    'latitude' => '34254353',
      //    'longitude' => '9839731',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'Krinsa-E',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'Aida-A',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'Zelda-E',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
   }
}
