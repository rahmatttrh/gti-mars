<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      // DB::table('ports')->insert([
      //    'name' => 'KJ4',
      //    'email' => 'kj4@gmail.com',
      //    'type' => 'LOC',
      //    'latitude' => '213218373',
      //    'longitude' => '9839731',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'KJ2',
      //    'email' => 'kj2@gmail.com',
      //    'type' => 'LOC',
      //    'latitude' => '213218373',
      //    'longitude' => '9839731',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'Cinta',
      //    'email' => 'cinta@gmail.com',
      //    'type' => 'CBU',
      //    'latitude' => '213218373',
      //    'longitude' => '9839731',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'Widuri',
      //    'email' => 'widuri@gmail.com',
      //    'type' => 'SBU',
      //    'latitude' => '34254353',
      //    'longitude' => '9839731',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'Intan Area',
      //    'email' => 'intan@gmail.com',
      //    'type' => 'SBU',
      //    'latitude' => '7612313',
      //    'longitude' => '927313334',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'PAB',
      //    'email' => 'pab@gmail.com',
      //    'type' => 'NBU',
      //    'latitude' => '7612313',
      //    'longitude' => '927313334',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      DB::table('ports')->insert([
         'code' => 'kj4',
         'name' => 'Kalijapat 4',
         'email' => 'kj4@gmail.com',
         'type' => 'Port',
         'latitude' => '-6.114402',
         'longitude' => '106.861452',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'kj5',
         'name' => 'Kalijapat 5',
         'email' => 'kj5@gmail.com',
         'type' => 'Port',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'kk',
         'name' => 'Kali Kresek',
         'email' => 'kalikresek@gmail.com',
         'type' => 'Port',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);


      DB::table('ports')->insert([
         'code' => '221',
         'name' => 'COSL 221',
         'email' => 'c221@gmail.com',
         'type' => 'Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => '222',
         'name' => 'COSL 222',
         'email' => 'c222@gmail.com',
         'type' => 'Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => '223',
         'name' => 'COSL 223',
         'email' => 'c223@gmail.com',
         'type' => 'Barge',
         'txid' => '01157764SKY52D1',
         'imo' => '9743772',
         'mmsi' => '525019671',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => '225',
         'name' => 'COSL 225',
         'email' => 'c225@gmail.com',
         'type' => 'Barge',
         'txid' => '01143850SKYDB0F',
         'imo' => '9743772',
         'mmsi' => '525019671',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'pw',
         'name' => 'Petroleum Winner',
         'email' => 'winner@gmail.com',
         'type' => 'Barge',
         'txid' => '01143661SKY635E',
         'imo' => '8767800',
         'mmsi' => '525019624',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'falcon',
         'name' => 'Falcon',
         'email' => 'falcon@gmail.com',
         'type' => 'Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'bc',
         'name' => 'Bayu Cakrawala',
         'email' => 'bayuc@gmail.com',
         'type' => 'Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'onix',
         'name' => 'Onyx',
         'email' => 'onyx@gmail.com',
         'type' => 'Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'pb',
         'name' => 'Pabelokan',
         'email' => 'pabelokan@gmail.com',
         'type' => 'Island',
         'latitude' => '-5.480265',
         'longitude' => '106.393652',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'tjl',
         'name' => 'Tanjung Lesung',
         'email' => 'tjlesung@gmail.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'h902',
         'name' => 'HYSY 902',
         'email' => 'hysy902@gmail.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'lisa',
         'name' => 'Lisa',
         'email' => 'lisa@gmail.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 's114',
         'name' => 'Ship 114',
         'email' => 'ship114@gmail.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'f2',
         'name' => 'Federal 2',
         'email' => 'federal2@gmail.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'superior',
         'name' => 'Superior',
         'email' => 'superior@gmail.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);








      // DB::table('ports')->insert([
      //    'name' => 'Rama-H',
      //    'latitude' => '34254353',
      //    'longitude' => '9839731',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'Krinsa-E',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'Aida-A',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'Zelda-E',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
   }
}
