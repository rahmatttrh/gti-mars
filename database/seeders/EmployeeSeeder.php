<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('employees')->insert([
         'department_id' => 1,
         'port_id' => 1,
         'name' => 'Marine',
         'email' => 'marine@gmail.com',
         'ekstensi' => '223',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('employees')->insert([
         'department_id' => 2,
         'port_id' => 1,
         'name' => 'Ahmad Juantoro',
         'email' => 'juan@gmail.com',
         'ekstensi' => '223',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('employees')->insert([
         'department_id' => 3,
         'port_id' => 1,
         'name' => 'Dareza Arvian',
         'email' => 'dareza@gmail.com',
         'ekstensi' => '669',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
