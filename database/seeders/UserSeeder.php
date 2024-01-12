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
      // $superuser = User::create([
      //    'name' => 'Super User',
      //    'email' => 'superuser@pertamina.com',
      //    'password' => Hash::make('12345678'),
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // $superuser->assignRole('superuser');

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
         'username' => 'marine',
         'email' => 'marine@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $msso->assignRole('marine');

      $admin_fm = User::create([
         'name' => 'Admin FM',
         'username' => 'fm',
         'email' => 'fm@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $admin_fm->assignRole('fm');


      // USER KJ
      $yoyo = User::create([
         'name' => 'Yoyo',
         'username' => 'yoyo',
         'email' => 'yoyo@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $yoyo->assignRole('department');

      $dimaz = User::create([
         'name' => 'Dimaz',
         'username' => 'dimaz',
         'email' => 'dimaz@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $dimaz->assignRole('department');

      $dicky = User::create([
         'name' => 'Dicky',
         'username' => 'dicky',
         'email' => 'dicky@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $dicky->assignRole('department');


      // USER PABELOKAN
      $andi = User::create([
         'name' => 'Andi',
         'username' => 'andi',
         'email' => 'andi@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $andi->assignRole('department');

      $aan = User::create([
         'name' => 'Aan',
         'username' => 'aan',
         'email' => 'aan@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $aan->assignRole('department');

      $said = User::create([
         'name' => 'Said',
         'username' => 'said',
         'email' => 'said@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $said->assignRole('department');

      $tommy = User::create([
         'name' => 'Tommy',
         'username' => 'tommy',
         'email' => 'tommy@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $tommy->assignRole('department');

      $sukma = User::create([
         'name' => 'Sukma Yogi',
         'username' => 'sukma',
         'email' => 'sukma@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $sukma->assignRole('department');

      $giat = User::create([
         'name' => 'Giat',
         'username' => 'giat',
         'email' => 'giat@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $giat->assignRole('department');

      $nuzila = User::create([
         'name' => 'Nuzila',
         'username' => 'nuzila',
         'email' => 'nuzila@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $nuzila->assignRole('department');

      $arief = User::create([
         'name' => 'Arief',
         'username' => 'arief',
         'email' => 'arief@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $arief->assignRole('department');


      // USER COSL221
      $cosl221 = User::create([
         'name' => 'COSL 221',
         'username' => 'cosl221',
         'email' => 'cosl221@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $cosl221->assignRole('department');


      // USER COSL222
      $muchsin = User::create([
         'name' => 'Abdillah Muchsin',
         'username' => 'muchsin',
         'email' => 'muchsin@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $muchsin->assignRole('department');


      // USER COSL223
      $cosl223 = User::create([
         'name' => 'COSL 223',
         'username' => 'cosl223',
         'email' => 'cosl223@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $cosl223->assignRole('department');


      // USER COSL225
      $felix = User::create([
         'name' => 'Felix',
         'username' => 'felix',
         'email' => 'felix@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $felix->assignRole('department');

      $faizal = User::create([
         'name' => 'Adam Faizal',
         'username' => 'faizal',
         'email' => 'faizal@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $faizal->assignRole('department');

      $bayu = User::create([
         'name' => 'Bayu Iqbal Tawakal',
         'username' => 'bayu',
         'email' => 'bayu@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $bayu->assignRole('department');


      // USER ONYX
      $mahmud = User::create([
         'name' => 'Mahmud',
         'username' => 'mahmud',
         'email' => 'mahmud@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $mahmud->assignRole('department');

      $umar = User::create([
         'name' => 'Umar',
         'username' => 'umar',
         'email' => 'umar@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $umar->assignRole('department');


      // USER WINNER
      $lulu = User::create([
         'name' => 'Lulu Luana Setiadi',
         'username' => 'lulu',
         'email' => 'lulu@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $lulu->assignRole('department');


      // USER BAYU CAKRAWALA
      $winner = User::create([
         'name' => 'Bayu Cakrawala',
         'username' => 'bayuc',
         'email' => 'bayuc@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $winner->assignRole('department');


      // USER HYSY 902
      $hysy902 = User::create([
         'name' => 'HYSY 902',
         'username' => 'hysy902',
         'email' => 'hysy902@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $hysy902->assignRole('department');


      // SUPERIOR
      $wahyu = User::create([
         'name' => 'Wahyu',
         'username' => 'wahyu',
         'email' => 'wahyu@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $wahyu->assignRole('department');

      $syawal = User::create([
         'name' => 'Syawal',
         'username' => 'syawal',
         'email' => 'syawal@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $syawal->assignRole('department');

      $jemmy = User::create([
         'name' => 'Jemmy Pentury',
         'username' => 'jemmy',
         'email' => 'jemmy@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $jemmy->assignRole('department');

      $saut = User::create([
         'name' => 'Saut Situmorang',
         'username' => 'saut',
         'email' => 'saut@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $saut->assignRole('department');


      // SHIP114
      $khamsani = User::create([
         'name' => 'Khamsani',
         'username' => 'khamsani',
         'email' => 'khamsani@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $khamsani->assignRole('department');


      // FALCON
      $slamet = User::create([
         'name' => 'Slamet',
         'username' => 'slamet',
         'email' => 'slamet@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $slamet->assignRole('department');


      // TANJUNG LESUNG
      $chlorid = User::create([
         'name' => 'Chlorid Latifoso',
         'username' => 'chlorid',
         'email' => 'chlorid@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $chlorid->assignRole('department');

      $rachmat = User::create([
         'name' => 'Rachmat Hidayat',
         'username' => 'rachmat',
         'email' => 'rachmat@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $rachmat->assignRole('department');

      $juhri = User::create([
         'name' => 'Juhri hasibuan',
         'username' => 'juhri',
         'email' => 'juhri@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $juhri->assignRole('department');


      // USER FEDERAL
      $poniman = User::create([
         'name' => 'Poniman',
         'username' => 'poniman',
         'email' => 'poniman@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $poniman->assignRole('department');

      $gunawan = User::create([
         'name' => 'Gunawan Winisobo',
         'username' => 'gunawan',
         'email' => 'gunawan@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $gunawan->assignRole('department');




      // Kapal

      $moloko = User::create([
         'name' => 'TRANSKO MOLOKO',
         'username' => 'moloko',
         'email' => 'moloko@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $moloko->assignRole('vessel');

      $balihe = User::create([
         'name' => 'TRANSKO BALIHE',
         'username' => 'balihe',
         'email' => 'balihe@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $balihe->assignRole('vessel');

      $logindo = User::create([
         'name' => 'LOGINDO OVERCOMER',
         'username' => 'logindo',
         'email' => 'logindo@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $logindo->assignRole('vessel');

      $indoliziz = User::create([
         'name' => 'INDOLIZIZ SATU',
         'username' => 'indoliziz',
         'email' => 'indoliziz@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $indoliziz->assignRole('vessel');

      $peteka = User::create([
         'name' => 'PETEKA 5402',
         'username' => 'peteka5402',
         'email' => 'peteka5402@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $peteka->assignRole('vessel');

      $sigap = User::create([
         'name' => 'SIGAP JAYA',
         'username' => 'sigapjaya',
         'email' => 'sigap@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $sigap->assignRole('vessel');

      $triton = User::create([
         'name' => 'TRITON JAWARA',
         'username' => 'tritonjawara',
         'email' => 'triton@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $triton->assignRole('vessel');

      $marvela = User::create([
         'name' => 'MARVELA 18',
         'username' => 'marvela18',
         'email' => 'marvela18@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $marvela->assignRole('vessel');

      $elok = User::create([
         'name' => 'ELOK JAYA',
         'username' => 'elokjaya',
         'email' => 'elok@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $elok->assignRole('vessel');

      $tekun = User::create([
         'name' => 'TEKUN JAYA',
         'username' => 'tekunjaya',
         'email' => 'tekun@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $tekun->assignRole('vessel');

      $giatjaya = User::create([
         'name' => 'GIAT JAYA',
         'username' => 'giatjaya',
         'email' => 'giatjaya@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $giatjaya->assignRole('vessel');

      $ina1 = User::create([
         'name' => 'INA PERMATA 1',
         'username' => 'inapermata1',
         'email' => 'ina1@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ina1->assignRole('vessel');

      $encone = User::create([
         'name' => 'ENC ONE',
         'username' => 'encone',
         'email' => 'encone@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $encone->assignRole('vessel');

      $ina2 = User::create([
         'name' => 'INA PERMATA 2',
         'username' => 'inapertamina2',
         'email' => 'ina2@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ina2->assignRole('vessel');

      $mega17 = User::create([
         'name' => 'TB. MEGAWATI 17',
         'username' => 'megawati17',
         'email' => 'mega17@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $mega17->assignRole('vessel');

      $patraoffshore = User::create([
         'name' => 'DSV PATRA OFFSHORE',
         'username' => 'patraoffshore',
         'email' => 'patraoffshore@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $patraoffshore->assignRole('vessel');

      $avior = User::create([
         'name' => 'OPS AVIOR',
         'username' => 'avior',
         'email' => 'avior@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $avior->assignRole('vessel');

      $merlion121 = User::create([
         'name' => 'MERLION 121',
         'username' => 'merlion121',
         'email' => 'merlion121@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $merlion121->assignRole('vessel');

      $tegasjaya = User::create([
         'name' => 'Tegas Jaya',
         'username' => 'tegasjaya',
         'email' => 'tegasjaya@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $tegasjaya->assignRole('vessel');

      $merlion131 = User::create([
         'name' => 'MERLION 131',
         'username' => 'merlion131',
         'email' => 'merlion131@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $merlion131->assignRole('vessel');

      $alpha = User::create([
         'name' => 'ALPHA MARINE',
         'username' => 'alphamarine',
         'email' => 'alpha@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $alpha->assignRole('vessel');

      $sanchai = User::create([
         'name' => 'SANCHAI HARBOUR',
         'username' => 'sanchaiharbour',
         'email' => 'sanchai@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $sanchai->assignRole('vessel');

      $prima6 = User::create([
         'name' => 'STK PRIMA 6',
         'username' => 'prima6',
         'email' => 'prima6@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $prima6->assignRole('vessel');

      $ansanus12 = User::create([
         'name' => 'ANSANUS 12',
         'username' => 'ansanus12',
         'email' => 'ansanus12@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ansanus12->assignRole('vessel');

      $ivani = User::create([
         'name' => 'MT. IVANI',
         'username' => 'ivani',
         'email' => 'ivani@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ivani->assignRole('vessel');

      $castmarine3 = User::create([
         'name' => 'CAST MARINE 3',
         'username' => 'castmarine3',
         'email' => 'castmarine3@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $castmarine3->assignRole('vessel');

      $panmarine6 = User::create([
         'name' => 'PAN MARINE 6',
         'username' => 'panmarine6',
         'email' => 'panmarine6@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $panmarine6->assignRole('vessel');

      $accelerate = User::create([
         'name' => 'NMS ACCELERATE',
         'username' => 'accelerate',
         'email' => 'accelerate@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $accelerate->assignRole('vessel');

      $clarissa68 = User::create([
         'name' => 'CLARISSA 68',
         'username' => 'clarissa68',
         'email' => 'clarissa68@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $clarissa68->assignRole('vessel');

      $magelang = User::create([
         'name' => 'MAGELANG',
         'username' => 'magelang',
         'email' => 'magelang@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $magelang->assignRole('vessel');

      $prisai = User::create([
         'name' => 'PRISAI',
         'username' => 'prisai',
         'email' => 'prisai@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $prisai->assignRole('vessel');

      $clara58 = User::create([
         'name' => 'CLARA 58',
         'username' => 'clara58',
         'email' => 'clara58@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $clara58->assignRole('vessel');

      $accomplish = User::create([
         'name' => 'NMS ACCOMPLISH',
         'username' => 'accomplish',
         'email' => 'accomplish@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $accomplish->assignRole('vessel');

      $salatiga = User::create([
         'name' => 'SALATIGA',
         'username' => 'salatiga',
         'email' => 'salatiga@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $salatiga->assignRole('vessel');

      $panmarine19 = User::create([
         'name' => 'PAN MARINE 19',
         'username' => 'panmarine19',
         'email' => 'panmarine19@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $panmarine19->assignRole('vessel');

      $patramarine = User::create([
         'name' => 'PATRA MARINE',
         'username' => 'patramarine',
         'email' => 'patramarine@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $patramarine->assignRole('vessel');




      // USER PLATFORM NBU
      $aidaa = User::create([
         'name' => 'Admin AIDA-A',
         'username' => 'aidaa',
         'email' => 'aidaa@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $aidaa->assignRole('department');

      $aryania = User::create([
         'name' => 'Admin ARYANI-A',
         'username' => 'aryania',
         'email' => 'aryania@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $aryania->assignRole('department');

      $chessya = User::create([
         'name' => 'Admin CHESSY-A',
         'username' => 'chessya',
         'email' => 'chessya@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $chessya->assignRole('department');

      $indria = User::create([
         'name' => 'Admin INDRI-A',
         'username' => 'indria',
         'email' => 'indria@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $indria->assignRole('department');


      // USER PLATFORM CBU
      $faridaa = User::create([
         'name' => 'Admin FARIDA-A',
         'username' => 'faridaa',
         'email' => 'faridaa@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $faridaa->assignRole('department');

      $faridab = User::create([
         'name' => 'Admin FARIDA-B',
         'username' => 'faridab',
         'email' => 'faridab@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $faridab->assignRole('department');

      $krisnaa = User::create([
         'name' => 'Admin KRISNA-A',
         'username' => 'krisnaa',
         'email' => 'krisnaa@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $krisnaa->assignRole('department');

      $krisnab = User::create([
         'name' => 'Admin KRISNA-B',
         'username' => 'krisnab',
         'email' => 'krisnab@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $krisnab->assignRole('department');


      // USER PLATFORM SBU
      $cintaa = User::create([
         'name' => 'Admin CINTA-A',
         'username' => 'cintaa',
         'email' => 'cintaa@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $cintaa->assignRole('department');

      $cintab = User::create([
         'name' => 'Admin CINTA-B',
         'username' => 'cintab',
         'email' => 'cintab@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $cintab->assignRole('department');

      $pabelokan = User::create([
         'name' => 'Admin PABELOKAN ISLAND',
         'username' => 'pabelokan',
         'email' => 'pabelokan@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $pabelokan->assignRole('department');

      $ramaa = User::create([
         'name' => 'Admin RAMA-A',
         'username' => 'ramaa',
         'email' => 'ramaa@pertamina.com',
         'password' => Hash::make('12345678'),
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      $ramaa->assignRole('department');
      
   }
}
