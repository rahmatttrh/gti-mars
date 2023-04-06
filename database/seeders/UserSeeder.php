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

      // $marine = User::create([
      //    'name' => 'Marine',
      //    'email' => 'marine@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $marine->assignRole('marine');

      $msso = User::create([
         'name' => 'Marine SSO',
         'email' => 'msso@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $msso->assignRole('marine');

      $logistic = User::create([
         'name' => 'Logistic',
         'email' => 'logistic@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $logistic->assignRole('logistic');

      $drilling = User::create([
         'name' => 'Drilling',
         'email' => 'drilling@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $drilling->assignRole('drilling');

      // Kapal
      $ej = User::create([
         'name' => 'Elok Jaya',
         'email' => 'ej@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ej->assignRole('vessel');

      $gj = User::create([
         'name' => 'Giat Jaya',
         'email' => 'gj@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $gj->assignRole('vessel');

      $tj = User::create([
         'name' => 'Triton Jawara',
         'email' => 'tj@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $tj->assignRole('vessel');

      $hj = User::create([
         'name' => 'Hafar Jupiter',
         'email' => 'hj@gmail.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $hj->assignRole('vessel');

      // $enc = User::create([
      //    'name' => 'ENC',
      //    'email' => 'enc@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $enc->assignRole('platform');

      // $gs = User::create([
      //    'name' => 'Graha Segara',
      //    'email' => 'gs@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $gs->assignRole('platform');

      // $peip = User::create([
      //    'name' => 'PEIP',
      //    'email' => 'peip@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $peip->assignRole('platform');

      // $indofood = User::create([
      //    'name' => 'Indofood',
      //    'email' => 'indofood@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $indofood->assignRole('supplier');

      // $unilever = User::create([
      //    'name' => 'Unilever',
      //    'email' => 'unilever@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $unilever->assignRole('supplier');

      // $kalbe = User::create([
      //    'name' => 'Kalbe',
      //    'email' => 'kalbe@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $kalbe->assignRole('supplier');

      // $gemilang = User::create([
      //    'name' => 'Gemilang Logistic',
      //    'email' => 'gemilang@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $gemilang->assignRole('tenant');


      // $intan = User::create([
      //    'name' => 'Intan Area',
      //    'email' => 'intan@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $intan->assignRole('retail');

      // $krisna = User::create([
      //    'name' => 'Krisna',
      //    'email' => 'krisna@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $krisna->assignRole('retail');


      // $superuser = User::create([
      //    'name' => 'User',
      //    'email' => 'user@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $superuser->assignRole('user');

      // $ej = User::create([
      //    'name' => 'Elok Jaya',
      //    'email' => 'ej@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $ej->assignRole('vessel');

      // $tj = User::create([
      //    'name' => 'Triton Jawara',
      //    'email' => 'tj@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $tj->assignRole('vessel');

      // $hj = User::create([
      //    'name' => 'Hafar Jupiter',
      //    'email' => 'hj@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $hj->assignRole('vessel');

      // $tb = User::create([
      //    'name' => 'Transko Balihe',
      //    'email' => 'tb@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $tb->assignRole('vessel');

      // $marine = User::create([
      //    'name' => 'Marine SSO',
      //    'email' => 'marine@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $marine->assignRole('marine');

      // $receiving = User::create([
      //    'name' => 'Receiving',
      //    'email' => 'receiving@gmail.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $receiving->assignRole('receiving');
   }
}
