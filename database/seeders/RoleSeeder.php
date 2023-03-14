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
         'name' => 'platform',
         'guard_name' => 'web'
      ]);

      Role::create([
         'name' => 'supplier',
         'guard_name' => 'web'
      ]);

      Role::create([
         'name' => 'tenant',
         'guard_name' => 'web'
      ]);

      Role::create([
         'name' => 'retail',
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

      Role::create([
         'name' => 'marine',
         'guard_name' => 'web'
      ]);
      // Role::create([
      //    'name' => 'user',
      //    'guard-name' => 'web'
      // ]);
   }
}
