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
      //    'email' => 'kj4@pertamina.com',
      //    'type' => 'LOC',
      //    'latitude' => '213218373',
      //    'longitude' => '9839731',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('ports')->insert([
      //    'name' => 'KJ2',
      //    'email' => 'kj2@pertamina.com',
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
         'code' => 'KJ4',
         'name' => 'Kalijapat 4',
         'email' => 'kj4@gmail.com',
         'type' => 'Port',
         'latitude' => '-6.114402',
         'longitude' => '106.861452',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'KJ4',
         'name' => 'Kalijapat 5',
         'email' => 'kj5@pertamina.com',
         'type' => 'Port',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'kk',
         'name' => 'Kali Kresek',
         'email' => 'kalikresek@pertamina.com',
         'type' => 'Port',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);


      DB::table('ports')->insert([
         'code' => '221',
         'mtd' => '091',
         'name' => 'COSL 221',
         'func' => 'DWI',
         'email' => 'cosl221@pertamina.com',
         'type' => 'Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => '222',
         'mtd' => '092',
         'name' => 'COSL 222',
         'func' => 'DWI',
         'email' => 'cosl222@pertamina.com',
         'type' => 'Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => '223',
         'mtd' => '093',
         'name' => 'COSL 223',
         'func' => 'DWI',
         'email' => 'cosl223@pertamina.com',
         'type' => 'Barge',
         'txid' => '01157764SKY52D1',
         'imo' => '9743772',
         'mmsi' => '525019671',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => '225',
         'mtd' => '095',
         'name' => 'COSL 225',
         'func' => 'DWI',
         'email' => 'cosl225@pertamina.com',
         'type' => 'Barge',
         'txid' => '01143850SKYDB0F',
         'imo' => '9743772',
         'mmsi' => '525019671',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'WINNER',
         'name' => 'Petroleum Winner',
         'func' => 'DWI',
         'email' => 'winner@pertamina.com',
         'type' => 'Barge',
         'txid' => '01143661SKY635E',
         'imo' => '8767800',
         'mmsi' => '525019624',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'GN-JATI',
         'name' => 'Gunung Jati',
         'email' => 'gnjati@pertamina.com',
         'type' => 'Barge',
         'func' => 'DWI',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'FALCON',
         'name' => 'Falcon',
         'email' => 'falcon@pertamina.com',
         'type' => 'Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'BCA',
         'name' => 'Bayu Cakrawala',
         'email' => 'bayuc@pertamina.com',
         'type' => 'Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'Onyx',
         'name' => 'Onyx',
         'email' => 'onyx@pertamina.com',
         'type' => 'Barge',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'PAB',
         'name' => 'Pabelokan',
         'email' => 'pabelokan@pertamina.com',
         'type' => 'Island',
         'latitude' => '-5.480265',
         'longitude' => '106.393652',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'Tj. LESUNG',
         'name' => 'Tanjung Lesung',
         'email' => 'tjlesung@pertamina.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'HYSY902',
         'name' => 'HYSY 902',
         'email' => 'hysy902@pertamina.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'LISA',
         'name' => 'Lisa',
         'email' => 'lisa@pertamina.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'S114',
         'name' => 'Ship 114',
         'email' => 'ship114@pertamina.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'FEDERAL',
         'name' => 'Federal',
         'email' => 'federal@pertamina.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'Superior',
         'name' => 'Superior',
         'email' => 'superior@pertamina.com',
         'type' => 'Rig/Barge/Tanker',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);




      // Platform
      DB::table('ports')->insert([
         'code' => 'AIDA-A',
         'name' => 'AIDA-A',
         'email' => 'aidaa@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'ARYANI-A',
         'name' => 'ARYANI-A',
         'email' => 'aryania@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'CHESSY-A',
         'name' => 'CHESSY-A',
         'email' => 'chessya@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'INDRI-A',
         'name' => 'INDRI-A',
         'email' => 'indria@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'INTAN-A',
         'name' => 'INTAN-A',
         'email' => 'intana@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'INTAN-AC',
         'name' => 'INTAN-AC (B.MONOPOD)',
         'email' => 'intanac@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('ports')->insert([
         'code' => 'INTAN-B',
         'name' => 'INTAN-B',
         'email' => 'intanb@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'INTAN-BPC',
         'name' => 'INTAN-BPC',
         'email' => 'intanbpc@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'LIDYA-A',
         'name' => 'LIDYA-A',
         'email' => 'lidyaa@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'NE.INTAN-A',
         'name' => 'NE.INTAN-A',
         'email' => 'neintana@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'NE.INTAN-AC',
         'name' => 'NE.INTAN-AC (MONOPOD)',
         'email' => 'neintanac@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'VITA-A',
         'name' => 'VITA-A (MONPOPOD)',
         'email' => 'vitaa@pertamina.com',
         'type' => 'Platform',
         'region' => 'NBU',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WIDURI-A',
         'name' => 'WIDURI-A',
         'region' => 'NBU',
         'email' => 'widuria@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WIDURI-B',
         'name' => 'WIDURI-B',
         'region' => 'NBU',
         'email' => 'widurib@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WIDURI-C',
         'name' => 'WIDURI-C',
         'region' => 'NBU',
         'email' => 'widuric@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WIDURI-DC',
         'name' => 'WIDURI-DC',
         'region' => 'NBU',
         'email' => 'widuridc@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WIDURI-E',
         'name' => 'WIDURI-E',
         'region' => 'NBU',
         'email' => 'widurie@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WIDURI-F',
         'name' => 'WIDURI-F (MONOPOD)',
         'region' => 'NBU',
         'email' => 'widuria@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WIDURI-G',
         'name' => 'WIDURI-G (MONOPOD)',
         'region' => 'NBU',
         'email' => 'widurig@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WIDURI-H',
         'name' => 'WIDURI-H (MONOPOD)',
         'region' => 'NBU',
         'email' => 'widurih@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WIDURI-P',
         'name' => 'WIDURI-P',
         'region' => 'NBU',
         'email' => 'widurip@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WINDRI-A',
         'name' => 'WINDRI-A (MONOPOD)',
         'region' => 'NBU',
         'email' => 'windria@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);



      // CBU
      DB::table('ports')->insert([
         'code' => 'ATTI-A',
         'name' => 'ATTI-A (MONOPOD)',
         'region' => 'CBU',
         'email' => 'attia@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'BANUWATI-A',
         'name' => 'BANUWATI-A',
         'region' => 'CBU',
         'email' => 'banuwatia@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'BANUWATI-K',
         'name' => 'BANUWATI-K ',
         'region' => 'CBU',
         'email' => 'banuwatik@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'FARIDA-A',
         'name' => 'FARIDA-A ',
         'region' => 'CBU',
         'email' => 'faridaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'FARIDA-B',
         'name' => 'FARIDA-B ',
         'region' => 'CBU',
         'email' => 'faridab@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'FARIDA-C',
         'name' => 'FARIDA-C ',
         'region' => 'CBU',
         'email' => 'faridac@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KARMILA-A',
         'name' => 'KARMILA-A ',
         'region' => 'CBU',
         'email' => 'karmilaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KARTINI-A',
         'name' => 'KARTINI-A (MONOPOD)',
         'region' => 'CBU',
         'email' => 'kartinia@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KRISNA-10',
         'name' => 'KRISNA-10 (TRIPOD)',
         'region' => 'CBU',
         'email' => 'krisna10@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KRISNA-A',
         'name' => 'KRISNA-A ',
         'region' => 'CBU',
         'email' => 'krisnaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KRISNA-B',
         'name' => 'KRISNA-B ',
         'region' => 'CBU',
         'email' => 'krisnab@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KRISNA-C',
         'name' => 'KRISNA-C ',
         'region' => 'CBU',
         'email' => 'krisnac@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KRISNA-D',
         'name' => 'KRISNA-D ',
         'region' => 'CBU',
         'email' => 'krisnad@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KRISNA-E',
         'name' => 'KRISNA-E ',
         'region' => 'CBU',
         'email' => 'krisnae@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KRISNA-P',
         'name' => 'KRISNA-P ',
         'region' => 'CBU',
         'email' => 'krisnap@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'MILA-A',
         'name' => 'MILA-A ',
         'region' => 'CBU',
         'email' => 'milaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'Z.ZELDA-A',
         'name' => 'Z.ZELDA-A (MONOPOD)',
         'region' => 'CBU',
         'email' => 'zzeldaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'SUNDARI-A',
         'name' => 'SUNDARI-A ',
         'region' => 'CBU',
         'email' => 'sundaria@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'SUNDARI-B',
         'name' => 'SUNDARI-B ',
         'region' => 'CBU',
         'email' => 'sundarib@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'THERESIA-A',
         'name' => 'THERESIA-A (MONOPOD)',
         'region' => 'CBU',
         'email' => 'theresiaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'TITI-A',
         'name' => 'TITI-A ',
         'region' => 'CBU',
         'email' => 'titia@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'YANI-A',
         'name' => 'YANI-A ',
         'region' => 'CBU',
         'email' => 'yania@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'YVONNE-A',
         'name' => 'YVONNE-A ',
         'region' => 'CBU',
         'email' => 'yvonnea@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'YVONNE-B',
         'name' => 'YVONNE-B ',
         'region' => 'CBU',
         'email' => 'yvonneb@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'ZELDA-A',
         'name' => 'ZELDA-A ',
         'region' => 'CBU',
         'email' => 'zeldaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'ZELDA-B',
         'name' => 'ZELDA-B ',
         'region' => 'CBU',
         'email' => 'zeldab@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'ZELDA-C',
         'name' => 'ZELDA-C ',
         'region' => 'CBU',
         'email' => 'zeldac@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'ZELDA-D',
         'name' => 'ZELDA-D ',
         'region' => 'CBU',
         'email' => 'zeldad@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'ZELDA-E',
         'name' => 'ZELDA-E ',
         'region' => 'CBU',
         'email' => 'zeldae@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'ZELDA-F',
         'name' => 'ZELDA-F (MONOPOD)',
         'region' => 'CBU',
         'email' => 'zeldaf@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'ZELDA-P',
         'name' => 'ZELDA-P ',
         'region' => 'CBU',
         'email' => 'zeldap@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'ZELDA-PC',
         'name' => 'ZELDA-PC ',
         'region' => 'CBU',
         'email' => 'zeldapc@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);



      // SBU
      DB::table('ports')->insert([
         'code' => 'CINTA-A',
         'name' => 'CINTA-A ',
         'region' => 'SBU',
         'email' => 'cintaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'CINTA-B',
         'name' => 'CINTA-B ',
         'region' => 'SBU',
         'email' => 'cintab@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'CINTA-C',
         'name' => 'CINTA-C ',
         'region' => 'SBU',
         'email' => 'cintac@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'CINTA-D',
         'name' => 'CINTA-D ',
         'region' => 'SBU',
         'email' => 'cintad@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'CINTA-E',
         'name' => 'CINTA-E ',
         'region' => 'SBU',
         'email' => 'cintae@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'CINTA-F',
         'name' => 'CINTA-F ',
         'region' => 'SBU',
         'email' => 'cintaf@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'CINTA-G',
         'name' => 'CINTA-G ',
         'region' => 'SBU',
         'email' => 'cintag@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'CINTA-H',
         'name' => 'CINTA-H ',
         'region' => 'SBU',
         'email' => 'cintah@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'CINTA-P',
         'name' => 'CINTA-P ',
         'region' => 'SBU',
         'email' => 'cintap@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'CINTA-P1',
         'name' => 'CINTA-P1 ',
         'region' => 'SBU',
         'email' => 'cintap1@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'DUMA-A',
         'name' => 'DUMA-A (JACKET ONLY)',
         'region' => 'SBU',
         'email' => 'dumaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'E.RAMA-A',
         'name' => 'E.RAMA-A (MONOPOD)',
         'region' => 'SBU',
         'email' => 'eramaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'GITA-A',
         'name' => 'GITA-A ',
         'region' => 'SBU',
         'email' => 'gitaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KITTY-4',
         'name' => 'KITTY-4 (CAISSON)',
         'region' => 'SBU',
         'email' => 'kitty4@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'KITTY-A',
         'name' => 'KITTY-A ',
         'region' => 'SBU',
         'email' => 'kittya@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'LITA-A',
         'name' => 'LITA-A (MONOPOD)',
         'region' => 'SBU',
         'email' => 'litaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'N.WANDA-A',
         'name' => 'N.WANDA-A (MONOPOD)',
         'region' => 'SBU',
         'email' => 'nwandaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'N.WANDA-B',
         'name' => 'N.WANDA-B (MONOPOD)',
         'region' => 'SBU',
         'email' => 'nwandab@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'NORA-A',
         'name' => 'NORA-A',
         'region' => 'SBU',
         'email' => 'noraa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'PABELOKAN ISLAND',
         'name' => 'PABELOKAN ISLAND',
         'region' => 'SBU',
         'email' => 'pabelokan@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RAMA-A',
         'name' => 'RAMA-A ',
         'region' => 'SBU',
         'email' => 'ramaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RAMA-B',
         'name' => 'RAMA-B ',
         'region' => 'SBU',
         'email' => 'ramab@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RAMA-C',
         'name' => 'RAMA-C ',
         'region' => 'SBU',
         'email' => 'ramac@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RAMA-D',
         'name' => 'RAMA-D ',
         'region' => 'SBU',
         'email' => 'ramad@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RAMA-E',
         'name' => 'RAMA-E ',
         'region' => 'SBU',
         'email' => 'ramae@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RAMA-F',
         'name' => 'RAMA-F ',
         'region' => 'SBU',
         'email' => 'ramaf@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RAMA-G',
         'name' => 'RAMA-G ',
         'region' => 'SBU',
         'email' => 'ramag@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RAMA-H',
         'name' => 'RAMA-H ',
         'region' => 'SBU',
         'email' => 'ramah@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RAMA-I',
         'name' => 'RAMA-I ',
         'region' => 'SBU',
         'email' => 'ramai@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RAMA-P',
         'name' => 'RAMA-P ',
         'region' => 'SBU',
         'email' => 'ramap@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'RETNO-A',
         'name' => 'RETNO-A (JACKET ONLY)',
         'region' => 'SBU',
         'email' => 'retnoa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'SELATAN-A',
         'name' => 'SELATAN-A (JACKET ONLY)',
         'region' => 'SBU',
         'email' => 'selatana@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'SELATAN-B',
         'name' => 'SELATAN-B (JACKET ONLY)',
         'region' => 'SBU',
         'email' => 'selatanb@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'SELATAN-C',
         'name' => 'SELATAN-C (JACKET ONLY)',
         'region' => 'SBU',
         'email' => 'selatanc@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'SURATMI-A',
         'name' => 'SURATMI-A',
         'region' => 'SBU',
         'email' => 'suratmia@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'SW.WANDA-A',
         'name' => 'SW.WANDA-A (MONOPOD)',
         'region' => 'SBU',
         'email' => 'swwandaa@pertamina.com',
         'type' => 'Platform',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('ports')->insert([
         'code' => 'WANDA-A',
         'name' => 'WANDA-A',
         'region' => 'SBU',
         'email' => 'wandaa@pertamina.com',
         'type' => 'Platform',
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
