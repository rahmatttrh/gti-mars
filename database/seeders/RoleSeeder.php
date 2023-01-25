<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Role::create([
         'name' => 'superuser',
         'guard_name' => 'web'
      ]);

      Role::create([
         'name' => 'user',
         'guard_name' => 'web'
      ]);

      Role::create([
         'name' => 'vessel',
         'guard_name' => 'web'
      ]);
      // Role::create([
      //    'name' => 'user',
      //    'guard-name' => 'web'
      // ]);
   }
}
