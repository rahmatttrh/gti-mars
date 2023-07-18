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
         'email' => 'superuser@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $superuser->assignRole('superuser');

      // $marine = User::create([
      //    'name' => 'Marine',
      //    'email' => 'marine@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $marine->assignRole('marine');

      $msso = User::create([
         'name' => 'Marine',
         'email' => 'marine@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $msso->assignRole('marine');

      $juan = User::create([
         'name' => 'Ahmad Juantoro',
         'email' => 'juan@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $juan->assignRole('department');

      $dareza = User::create([
         'name' => 'Dareza Arvian',
         'email' => 'dareza@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $dareza->assignRole('department');

      $fikri = User::create([
         'name' => 'Abdul Fikri',
         'email' => 'fikri@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $fikri->assignRole('department');

      $ari = User::create([
         'name' => 'Ari Pratama',
         'email' => 'ari@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ari->assignRole('department');

      // $logistic = User::create([
      //    'name' => 'Logistic',
      //    'email' => 'logistic@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $logistic->assignRole('logistic');

      // $drilling = User::create([
      //    'name' => 'Drilling',
      //    'email' => 'drilling@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $drilling->assignRole('drilling');

      // Kapal

      $moloko = User::create([
         'name' => 'TRANSKO MOLOKO',
         'email' => 'moloko@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $moloko->assignRole('vessel');

      $baliho = User::create([
         'name' => 'TRANSKO BALIHO',
         'email' => 'baliho@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $baliho->assignRole('vessel');

      $logindo = User::create([
         'name' => 'LOGINDO OVERCOMER',
         'email' => 'logindo@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $logindo->assignRole('vessel');

      $indoliziz = User::create([
         'name' => 'INDOLIZIZ SATU',
         'email' => 'indoliziz@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $indoliziz->assignRole('vessel');

      $peteka = User::create([
         'name' => 'PETEKA 5402',
         'email' => 'peteka5402@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $peteka->assignRole('vessel');

      $sigap = User::create([
         'name' => 'SIGAP JAYA',
         'email' => 'sigap@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $sigap->assignRole('vessel');

      $triton = User::create([
         'name' => 'TRITON JAWARA',
         'email' => 'triton@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $triton->assignRole('vessel');

      $marvela = User::create([
         'name' => 'MARVELA 18',
         'email' => 'marvela18@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $marvela->assignRole('vessel');

      $elok = User::create([
         'name' => 'ELOK JAYA',
         'email' => 'elok@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $elok->assignRole('vessel');

      $tekun = User::create([
         'name' => 'TEKUN JAYA',
         'email' => 'tekun@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $tekun->assignRole('vessel');

      $giat = User::create([
         'name' => 'GIAT JAYA',
         'email' => 'giat@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $giat->assignRole('vessel');

      $ina1 = User::create([
         'name' => 'INA PERMATA 1',
         'email' => 'ina1@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ina1->assignRole('vessel');

      $encone = User::create([
         'name' => 'ENC ONE',
         'email' => 'encone@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $encone->assignRole('vessel');

      $ina2 = User::create([
         'name' => 'INA PERMATA 2',
         'email' => 'ina2@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ina2->assignRole('vessel');

      $mega17 = User::create([
         'name' => 'TB. MEGAWATI 17',
         'email' => 'mega17@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $mega17->assignRole('vessel');

      $patraoffshore = User::create([
         'name' => 'DSV PATRA OFFSHORE',
         'email' => 'patraoffshore@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $patraoffshore->assignRole('vessel');

      $avior = User::create([
         'name' => 'OPS AVIOR',
         'email' => 'avior@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $avior->assignRole('vessel');

      $merlion121 = User::create([
         'name' => 'MERLION 121',
         'email' => 'merlion121@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $merlion121->assignRole('vessel');

      $merlion131 = User::create([
         'name' => 'MERLION 131',
         'email' => 'merlion131@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $merlion131->assignRole('vessel');

      $alpha = User::create([
         'name' => 'ALPHA MARINE',
         'email' => 'alpha@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $alpha->assignRole('vessel');

      $sanchai = User::create([
         'name' => 'SANCHAI HARBOUR',
         'email' => 'sanchai@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $sanchai->assignRole('vessel');

      $prima6 = User::create([
         'name' => 'STK PRIMA 6',
         'email' => 'prima6@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $prima6->assignRole('vessel');

      $ansanus12 = User::create([
         'name' => 'ANSANUS 12',
         'email' => 'ansanus12@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ansanus12->assignRole('vessel');

      $ivani = User::create([
         'name' => 'MT. IVANI',
         'email' => 'ivani@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ivani->assignRole('vessel');

      $castmarine3 = User::create([
         'name' => 'CAST MARINE 3',
         'email' => 'castmarine3@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $castmarine3->assignRole('vessel');

      $panmarine6 = User::create([
         'name' => 'PAN MARINE 6',
         'email' => 'panmarine6@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $panmarine6->assignRole('vessel');

      $accelerate = User::create([
         'name' => 'NMS ACCELERATE',
         'email' => 'accelerate@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $accelerate->assignRole('vessel');

      $clarissa68 = User::create([
         'name' => 'CLARISSA 68',
         'email' => 'clarissa68@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $clarissa68->assignRole('vessel');

      $magelang = User::create([
         'name' => 'MAGELANG',
         'email' => 'magelang@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $magelang->assignRole('vessel');

      $clara58 = User::create([
         'name' => 'CLARA 58',
         'email' => 'clara58@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $clara58->assignRole('vessel');

      $accomplish = User::create([
         'name' => 'NMS ACCOMPLISH',
         'email' => 'accomplish@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $accomplish->assignRole('vessel');

      $salatiga = User::create([
         'name' => 'SALATIGA',
         'email' => 'salatiga@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $salatiga->assignRole('vessel');

      $panmarine19 = User::create([
         'name' => 'PAN MARINE 19',
         'email' => 'panmarine19@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $panmarine19->assignRole('vessel');

      $patramarine = User::create([
         'name' => 'PATRA MARINE',
         'email' => 'patramarine@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $patramarine->assignRole('vessel');

      // $ej = User::create([
      //    'name' => 'Elok Jaya',
      //    'email' => 'ej@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $ej->assignRole('vessel');

      // $gj = User::create([
      //    'name' => 'Giat Jaya',
      //    'email' => 'gj@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $gj->assignRole('vessel');

      // $tj = User::create([
      //    'name' => 'Triton Jawara',
      //    'email' => 'tj@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $tj->assignRole('vessel');

      // $hj = User::create([
      //    'name' => 'Hafar Jupiter',
      //    'email' => 'hj@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $hj->assignRole('vessel');

      // $enc = User::create([
      //    'name' => 'ENC',
      //    'email' => 'enc@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $enc->assignRole('platform');

      // $gs = User::create([
      //    'name' => 'Graha Segara',
      //    'email' => 'gs@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $gs->assignRole('platform');

      // $peip = User::create([
      //    'name' => 'PEIP',
      //    'email' => 'peip@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $peip->assignRole('platform');

      // $indofood = User::create([
      //    'name' => 'Indofood',
      //    'email' => 'indofood@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $indofood->assignRole('supplier');

      // $unilever = User::create([
      //    'name' => 'Unilever',
      //    'email' => 'unilever@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $unilever->assignRole('supplier');

      // $kalbe = User::create([
      //    'name' => 'Kalbe',
      //    'email' => 'kalbe@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $kalbe->assignRole('supplier');

      // $gemilang = User::create([
      //    'name' => 'Gemilang Logistic',
      //    'email' => 'gemilang@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $gemilang->assignRole('tenant');


      // $intan = User::create([
      //    'name' => 'Intan Area',
      //    'email' => 'intan@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $intan->assignRole('retail');

      // $krisna = User::create([
      //    'name' => 'Krisna',
      //    'email' => 'krisna@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $krisna->assignRole('retail');


      // $superuser = User::create([
      //    'name' => 'User',
      //    'email' => 'user@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $superuser->assignRole('user');

      // $ej = User::create([
      //    'name' => 'Elok Jaya',
      //    'email' => 'ej@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $ej->assignRole('vessel');

      // $tj = User::create([
      //    'name' => 'Triton Jawara',
      //    'email' => 'tj@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $tj->assignRole('vessel');

      // $hj = User::create([
      //    'name' => 'Hafar Jupiter',
      //    'email' => 'hj@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $hj->assignRole('vessel');

      // $tb = User::create([
      //    'name' => 'Transko Balihe',
      //    'email' => 'tb@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $tb->assignRole('vessel');

      // $marine = User::create([
      //    'name' => 'Marine SSO',
      //    'email' => 'marine@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $marine->assignRole('marine');

      // $receiving = User::create([
      //    'name' => 'Receiving',
      //    'email' => 'receiving@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $receiving->assignRole('receiving');
   }
}
