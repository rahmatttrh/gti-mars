<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('departments')->insert([
         'name' => 'Marine',
         'code' => 'M',
         'email' => 'marine@gmail.com',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('departments')->insert([
         'name' => 'Logistic',
         'code' => 'L',
         'email' => 'logistic@gmail.com',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('departments')->insert([
         'name' => 'Drilling',
         'code' => 'D',
         'email' => 'drilling@gmail.com',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
