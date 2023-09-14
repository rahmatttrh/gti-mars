<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VesselSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      // DB::table('vessels')->insert([
      //    'status' => 0,
      //    'name' => 'Elok Jaya',
      //    'prev_name' => '-',
      //    'imo' => '92603',
      //    'email' => 'ej@pertamina.com',
      //    'telp' => '020323445',
      //    'require' => 'SCV',
      //    'type' => 'Anchor Handling Tug Supply',
      //    'flag' => 'Indonesia',
      //    'call_sign' => 'XYZ',
      //    'owner' => 'PT XYZ',
      //    'operator' => 'PHE',
      //    'portname' => 'Jakarta',
      //    'build' => '2004',
      //    'deckcapacity' => 500,
      //    'deckspace' => 60,
      //    'deadweight' => 3.00,
      //    'dpa_name' => 'Ahmad Juantoro',
      //    'dpa_telp' => '089990203131',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('vessels')->insert([
      //    'status' => 0,
      //    'name' => 'Giat Jaya',
      //    'email' => 'gj@pertamina.com',
      //    'type' => 'Anchor Handling Tug Supply',
      //    'require' => 'SCV',
      //    'telp' => '0899231314',
      //    'deckcapacity' => 500,
      //    'deckspace' => 60,
      //    'deadweight' => 1,
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('vessels')->insert([
      //    'status' => 0,
      //    'name' => 'Triton Jawara',
      //    'imo' => '4423424',
      //    'email' => 'tj@pertamina.com',
      //    'require' => 'AHTS',
      //    'telp' => '0899231314',
      //    'type' => 'Tug Boat',
      //    'flag' => 'Indonesia',
      //    'deckcapacity' => 350,
      //    'deckspace' => 15,
      //    'deadweight' => 2.00,
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('vessels')->insert([
      //    'status' => 1,
      //    'name' => 'Hafar Jupiter',
      //    'type' => 'Tug Boat',
      //    'email' => 'hj@pertamina.com',
      //    'deckspace' => 23,
      //    'deadweight' => 2.5,
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      DB::table('vessels')->insert([
         'status' => 1,
         'name' => 'TRANSKO MOLOKO',
         'username' => 'moloko',
         'type' => 'AHTS',
         'email' => 'moloko@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'TRANSKO BALIHO',
         'username' => 'baliho',
         'type' => 'AHTS',
         'email' => 'baliho@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'LOGINDO OVERCOMER',
         'username' => 'logindo',
         'type' => 'AHTS',
         'email' => 'logindo@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'INDOLIZIZ SATU',
         'username' => 'indoliziz',
         'type' => 'AHTS',
         'email' => 'indoliziz@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'PETEKA 5402',
         'username' => 'peteka5402',
         'type' => 'AHTS',
         'email' => 'peteka5402@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'SIGAP JAYA',
         'username' => 'sigapjaya',
         'type' => 'Crew Boat',
         'email' => 'sigap@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'TRITON JAWARA',
         'username' => 'tritonjawara',
         'type' => 'AHTS',
         'email' => 'triton@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'MARVELA 08',
         'username' => 'marvela08',
         'type' => 'Supply Vessel',
         'email' => 'marvela08@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'ELOK JAYA',
         'username' => 'elokjaya',
         'type' => 'Supply Vessel',
         'email' => 'elok@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'TEKUN JAYA',
         'username' => 'tekunjaya',
         'type' => 'AHTS',
         'email' => 'tekun@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'GIAT JAYA',
         'username' => 'giatjaya',
         'type' => 'Supply Vessel',
         'email' => 'giat@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'INA PERMATA 1',
         'username' => 'inapermata1',
         'type' => 'Tug Boat',
         'email' => 'ina1@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'ENC ONE',
         'username' => 'encone',
         'type' => 'Tug Boat',
         'email' => 'encone@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'INA PERMATA 2',
         'username' => 'inapermata2',
         'type' => 'Tug Boat',
         'email' => 'ina2@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'TB. MEGAWATI 17',
         'username' => 'megawati17',
         'type' => 'Tug Boat',
         'email' => 'mega17@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'DSV. PATRA OFFSHORE',
         'username' => 'patraoffshore',
         'type' => 'Diiving & Support Vessel',
         'email' => 'patraoffshore@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'OPS AVIOR',
         'username' => 'avior',
         'type' => 'Offshore Supply Ship',
         'email' => 'avior@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'MERLION 121',
         'username' => 'merlion121',
         'type' => 'Tug Boat',
         'email' => 'merlion121@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'MERLION 131',
         'username' => 'merlion131',
         'type' => 'Tug Boat',
         'email' => 'merlion131@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'ALPHA MARINE',
         'username' => 'alphamarine',
         'type' => 'Tug Boat',
         'email' => 'alpha@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'SANCHAI HARBOUR',
         'username' => 'sanchaiharbour',
         'type' => 'Tug Boat',
         'email' => 'sanchai@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'STK PRIMA 6',
         'username' => 'prima6',
         'type' => 'Tug Boat',
         'email' => 'prima6@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'ANSANUS 12',
         'username' => 'ansanus12',
         'type' => 'Tug Boat',
         'email' => 'ansanus12@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'MT. IVANI',
         'username' => 'ivani',
         'type' => 'Motor Tanker',
         'email' => 'ivani@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'CAST MARINE 3',
         'username' => 'castmarine3',
         'type' => 'Crew Boat',
         'email' => 'castmarine3@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'PAN MARINE 6',
         'username' => 'panmarine6',
         'type' => 'Crew Boat',
         'email' => 'panmarine6@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'NMS ACCELERATE',
         'username' => 'nmsaccelerate',
         'type' => 'Crew Boat',
         'email' => 'accelerate@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'CLARISSA 68',
         'username' => 'clarissa68',
         'type' => 'Crew Boat',
         'email' => 'clarissa68@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'MAGELANG',
         'username' => 'magelang',
         'type' => 'Crew Boat',
         'email' => 'magelang@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'CLARA 58',
         'username' => 'clara58',
         'type' => 'Crew Boat',
         'email' => 'clara58@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'NMS ACCOMPLISH',
         'username' => 'accomplish',
         'type' => 'Crew Boat',
         'email' => 'accomplish@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'SALATIGA',
         'username' => 'salatiga',
         'type' => 'Crew Boat',
         'email' => 'salatiga@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'PAN MARINE 19',
         'username' => 'panmarine19',
         'type' => 'Crew Boat',
         'email' => 'panmarine19@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'PATRA MARINE',
         'username' => 'patramarine',
         'type' => 'Diving & Support Vessel',
         'email' => 'patramarine@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
