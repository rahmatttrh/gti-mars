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
         'status' => 0,
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
         'name' => 'TRANSKO BALIHE',
         'username' => 'balihe',
         'type' => 'AHTS',
         'email' => 'balihe@pertamina.com',
         'txid' => '01143866SKY1B5F',
         'imo' => '9704879',
         'mmsi' => '525016748',
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
         'txid' => '01157857SKY48A2',
         'imo' => '9489443',
         'mmsi' => '525015881',
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
         'mmsi' => '525019671',
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
         'txid' => '01314493SKYABEE',
         'imo' => '9704879',
         'mmsi' => '525016748',
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
         'txid' => '01143705SKY143A',
         'imo' => '8984692',
         'mmsi' => '525016299',
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
         'txid' => '01314671SKY7768',
         'imo' => '9737668',
         'mmsi' => '525006284',
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
         'txid' => '01157762SKY4AC7',
         'imo' => '9543483',
         'mmsi' => '525003414',
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
         'txid' => '01314295SKY9010',
         'imo' => '9704726',
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
         'email' => 'giatjaya@pertamina.com',
         'deckspace' => 60,
         'deadweight' => 100,
         'master' => 'Yudi Hermanto',
         'co' => 'Indra Ismiyanto',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'INA PERMATA 1',
         'username' => 'inapermata1',
         'type' => 'Tug Boat',
         'email' => 'ina1@pertamina.com',
         'txid' => '01157856SKYC49D',
         'imo' => '9278260',
         'mmsi' => '525019603',
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
         'txid' => '01143663SKY6B68',
         'imo' => '9576038',
         'mmsi' => '525018453',
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
         'txid' => '01314501SKYCC16',
         'imo' => '9803053',
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
         'txid' => '01143267SKY33AC',
         'imo' => '8502729',
         'mmsi' => '525009172',
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
         'txid' => '01157766SKY5ADB',
         'imo' => '9562283',
         'mmsi' => '525300032',
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
         'txid' => '01143146SKYCD4F',
         'imo' => '5984202',
         'mmsi' => '525300131',
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
         'txid' => '01143663SKY6B68',
         'imo' => '9576038',
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
         'txid' => '01143656SKYCF45',
         'imo' => '9534937',
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
         'imo' => '8984692',
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
         'txid' => '01157803SKY6F94',
         'imo' => '9704726',
         'mmsi' => '525016749',
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
         'txid' => '01314552SKY1915',
         'imo' => '5705660',
         'mmsi' => '525019672',
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
         'txid' => '01157859SKY50AC',
         'imo' => '9438975',
         'mmsi' => '525015964',
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
         'txid' => '01314543SKY74E8',
         'imo' => '9737668',
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
         'txid' => '01314524SKYA889',
         'imo' => '9743772',
         'mmsi' => '525019671',
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
         'txid' => '01157838SKY7C43',
         'imo' => '9709582',
         'mmsi' => '525018274',
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
         // 'txid' => '01143267SKY33AC',
         // 'imo' => '8502729',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'PRISAI',
         'username' => 'prisai',
         'type' => 'Crew Boat',
         'email' => 'prisai@pertamina.com',
         // 'txid' => '01143267SKY33AC',
         // 'imo' => '8502729',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('vessels')->insert([
         'status' => 0,
         'name' => 'TEGAS JAYA',
         'username' => 'tegasjaya',
         'type' => 'Crew Boat',
         'email' => 'tegasjaya@pertamina.com',
         'mmsi' => '500000000',
         'deckspace' => 60,
         'deadweight' => 100,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      // DB::table('vessels')->insert([
      //    'status' => 0,
      //    'name' => 'Dev VTS Vessel',
      //    'username' => 'devvts',
      //    'type' => 'Crew Boat',
      //    'email' => 'devvts@pertamina.com',
      //    'txid' => '52500012787',
      //    'mmsi' => '52500012787',
      //    'deckspace' => 60,
      //    'deadweight' => 100,
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

   

   }
}
