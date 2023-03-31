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
         'code' => 'MRN',
         'email' => 'marine@gmail.com',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('departments')->insert([
         'name' => 'Logistic',
         'code' => 'LGS',
         'email' => 'logistic@gmail.com',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('departments')->insert([
         'name' => 'Drilling',
         'code' => 'DRL',
         'email' => 'drilling@gmail.com',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
