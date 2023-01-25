<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $superuser = User::create([
         'name' => 'Super User',
         'email' => 'superuser@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $superuser->assignRole('superuser');


      $superuser = User::create([
         'name' => 'User',
         'email' => 'user@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $superuser->assignRole('user');

      $ej = User::create([
         'name' => 'Elok Jaya',
         'email' => 'ej@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ej->assignRole('vessel');

      $tj = User::create([
         'name' => 'Triton Jawara',
         'email' => 'tj@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $tj->assignRole('vessel');
   }
}
