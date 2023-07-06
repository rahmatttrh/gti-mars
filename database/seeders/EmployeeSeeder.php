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
         'email' => 'marine@pertamina.com',
         'ekstensi' => '223',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('employees')->insert([
         'department_id' => 2,
         'port_id' => 1,
         'name' => 'Ahmad Juantoro',
         'email' => 'juan@pertamina.com',
         'ekstensi' => '223',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('employees')->insert([
         'department_id' => 3,
         'port_id' => 1,
         'name' => 'Dareza Arvian',
         'email' => 'dareza@pertamina.com',
         'ekstensi' => '669',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('employees')->insert([
         'department_id' => 2,
         'port_id' => 4,
         'name' => 'Abdul Fikri',
         'email' => 'fikri@pertamina.com',
         'ekstensi' => '882',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('employees')->insert([
         'department_id' => 2,
         'port_id' => 6,
         'name' => 'Ari Pratama',
         'email' => 'ari@pertamina.com',
         'ekstensi' => '138',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
