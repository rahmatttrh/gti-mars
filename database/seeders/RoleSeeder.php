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
         'name' => 'superadmin',
         'guard_name' => 'web'
      ]);
      Role::create([
         'name' => 'admin',
         'guard_name' => 'web'
      ]);
      Role::create([
         'name' => 'marine',
         'guard_name' => 'web'
      ]);
      Role::create([
         'name' => 'department',
         'guard_name' => 'web'
      ]);
      Role::create([
         'name' => 'logistic',
         'guard_name' => 'web'
      ]);

      Role::create([
         'name' => 'drilling',
         'guard_name' => 'web'
      ]);

      Role::create([
         'name' => 'vessel',
         'guard_name' => 'web'
      ]);

      Role::create([
         'name' => 'port',
         'guard_name' => 'web'
      ]);

      Role::create([
         'name' => 'fm',
         'guard_name' => 'web'
      ]);

      Role::create([
         'name' => 'barge',
         'guard_name' => 'web'
      ]);

      // Role::create([
      //    'name' => 'platform',
      //    'guard_name' => 'web'
      // ]);

      // Role::create([
      //    'name' => 'supplier',
      //    'guard_name' => 'web'
      // ]);

      // Role::create([
      //    'name' => 'tenant',
      //    'guard_name' => 'web'
      // ]);

      // Role::create([
      //    'name' => 'retail',
      //    'guard_name' => 'web'
      // ]);

      Role::create([
         'name' => 'user',
         'guard_name' => 'web'
      ]);



      // Role::create([
      //    'name' => 'marine',
      //    'guard_name' => 'web'
      // ]);
      // Role::create([
      //    'name' => 'receiving',
      //    'guard_name' => 'web'
      // ]);
   }
}
