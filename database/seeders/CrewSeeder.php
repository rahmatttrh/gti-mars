<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CrewSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      
      DB::table('crews')->insert([
         'status' => 1,
         'name' => 'Ahmad Juantoro',
         'vessel_id' => 11,
         'rank_id' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      $juan = User::create([
         'name' => 'Ahmad Juantoro',
         'username' => 'aj',
         'email' => 'aj@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $juan->assignRole('master');



      DB::table('crews')->insert([
         'status' => 1,
         'name' => 'Dareza Arvian',
         'vessel_id' => 11,
         'rank_id' => 2,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $dareza = User::create([
         'name' => 'Dareza Arvian',
         'username' => 'da',
         'email' => 'da@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $dareza->assignRole('co');
   }
}
