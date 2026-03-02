<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 1,
         'port_id' => 1,
         'name' => 'Marine',
         'username' => 'marine',
         'email' => 'marine@pertamina.com',
         'ekstensi' => '223',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      // USER KJ4
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 1,
         'name' => 'Yoyo',
         'email' => 'yoyo@pertamina.com',
         'username' => 'yoyo',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 1,
         'name' => 'adm_logistic',
         'email' => 'adm_logistic@pertamina.com',
         'username' => 'adm_logistic',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 1,
         'name' => 'Kalijapat 4',
         'email' => 'kj4@pertamina.com',
         'username' => 'kj4',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 1,
      //    'name' => 'Dimaz',
      //    'email' => 'dimaz@pertamina.com',
      //    'username' => 'dimaz',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 1,
      //    'name' => 'Dicky',
      //    'email' => 'dicky@pertamina.com',
      //    'username' => 'dicky',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER PABELOKAN
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 12,
         'name' => 'Pabelokan Island',
         'email' => 'pab@pertamina.com',
         'username' => 'pab',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 12,
      //    'name' => 'Andi',
      //    'email' => 'andi@pertamina.com',
      //    'username' => 'andi',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 12,
      //    'name' => 'Aan',
      //    'email' => 'aan@pertamina.com',
      //    'username' => 'aan',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
         
      //    'department_id' => 2,
      //    'port_id' => 12,
      //    'name' => 'Said',
      //    'email' => 'said@pertamina.com',
      //    'username' => 'said',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
         
      //    'department_id' => 2,
      //    'port_id' => 12,
      //    'name' => 'Tommy',
      //    'email' => 'Tommy@pertamina.com',
      //    'username' => 'Tommy',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 12,
      //    'name' => 'Sukma Yogi',
      //    'email' => 'sukma@pertamina.com',
      //    'username' => 'sukma',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 12,
      //    'name' => 'Giat',
      //    'email' => 'giat@pertamina.com',
      //    'username' => 'giat',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 12,
      //    'name' => 'Nuzila',
      //    'email' => 'nuzila@pertamina.com',
      //    'username' => 'nuzila',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 12,
      //    'name' => 'Arief',
      //    'email' => 'arief@pertamina.com',
      //    'username' => 'arief',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER COSL221
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 4,
         'name' => 'COSL 221',
         'email' => 'cosl221@pertamina.com',
         'username' => 'cosl221',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);


      // USER COSL222
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 5,
         'name' => 'COSL 222',
         'email' => 'cosl222@pertamina.com',
         'username' => 'cosl222',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 5,
      //    'name' => 'Abdillah Muchsin',
      //    'email' => 'muchsin@pertamina.com',
      //    'username' => 'muchsin',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER COSL223
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 6,
         'name' => 'COSL 223',
         'email' => 'cosl223@pertamina.com',
         'username' => 'cosl223',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);


      // USER COSL225
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 7,
         'name' => 'COSL 225',
         'email' => 'cosl225@pertamina.com',
         'username' => 'cosl225',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 7,
      //    'name' => 'Felix',
      //    'email' => 'felix@pertamina.com',
      //    'username' => 'felix',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 7,
      //    'name' => 'Adam Faizal',
      //    'email' => 'faizal@pertamina.com',
      //    'username' => 'faizal',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 7,
      //    'name' => 'Bayu Iqbal Tawakal',
      //    'email' => 'bayu@pertamina.com',
      //    'username' => 'bayu',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER ONYX
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 11,
         'name' => 'Onyx',
         'email' => 'onix@pertamina.com',
         'username' => 'onix',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 11,
      //    'name' => 'Mahmud',
      //    'email' => 'mahmud@pertamina.com',
      //    'username' => 'mahmud',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 11,
      //    'name' => 'Umar',
      //    'email' => 'umar@pertamina.com',
      //    'username' => 'umar',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER WINNER
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 8,
         'name' => 'Winner',
         'email' => 'winner@pertamina.com',
         'username' => 'winner',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 8,
      //    'name' => 'Lulu Luana Setiadi',
      //    'email' => 'lulu@pertamina.com',
      //    'username' => 'lulu',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER BAYU CAKRAWALA
      
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 10,
         'name' => 'Bayu Cakrawala',
         'email' => 'bca@pertamina.com',
         'username' => 'bca',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);


      // USER SUPERIOR
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 18,
         'name' => 'Superior',
         'email' => 'superior@pertamina.com',
         'username' => 'superior',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 18,
      //    'name' => 'Wahyu',
      //    'email' => 'wahyu@pertamina.com',
      //    'username' => 'wahyu',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 18,
      //    'name' => 'Syawal',
      //    'email' => 'syawal@pertamina.com',
      //    'username' => 'syawal',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 18,
      //    'name' => 'Jemmy Pentury',
      //    'email' => 'jemmy@pertamina.com',
      //    'username' => 'jemmy',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 18,
      //    'name' => 'Saut Situmorang',
      //    'email' => 'saut@pertamina.com',
      //    'username' => 'saut',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER SHIP114
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 16,
         'name' => 'Ship 114',
         'email' => 'ship114@pertamina.com',
         'username' => 'ship114',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 16,
      //    'name' => 'Khamsani',
      //    'email' => 'khamsani@pertamina.com',
      //    'username' => 'khamsani',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER FALCON
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 9,
         'name' => 'Falcon',
         'email' => 'falcon@pertamina.com',
         'username' => 'falcon',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 9,
      //    'name' => 'Slamet',
      //    'email' => 'slamet@pertamina.com',
      //    'username' => 'slamet',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER TANJUNG LESUNG
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 13,
         'name' => 'Tanjung Lesung',
         'email' => 'tjlesung@pertamina.com',
         'username' => 'tjlesung',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 13,
      //    'name' => 'Chlorid Latifoso',
      //    'email' => 'chlorid@pertamina.com',
      //    'username' => 'chlorid',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 13,
      //    'name' => 'Rachmat Hidayat',
      //    'email' => 'rachmat@pertamina.com',
      //    'username' => 'rachmat',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 13,
      //    'name' => 'Juhri hasibuan',
      //    'email' => 'juhri@pertamina.com',
      //    'username' => 'juhri',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER FEDERAL
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 17,
         'name' => 'Federal',
         'email' => 'federal@pertamina.com',
         'username' => 'federal',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      // DB::table('employees')->insert([
      //    'status' => 1,
      //    'department_id' => 2,
      //    'port_id' => 17,
      //    'name' => 'Gunawan Wibisono',
      //    'email' => 'gunawan@pertamina.com',
      //    'username' => 'gunawan',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // USER HYSY 902
      
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 14,
         'name' => 'HYSY 902',
         'email' => 'hysy902@pertamina.com',
         'username' => 'hysy902',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);


      // USER LISA
      DB::table('employees')->insert([
         'status' => 1,
         'department_id' => 2,
         'port_id' => 15,
         'name' => 'Lisa',
         'email' => 'lisa@pertamina.com',
         'username' => 'lisa',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);



      // User Platform NBU
      Employee::create([
         'status' => 1,
         'port_id' => 19,
         'name' => 'Admin AIDA-A',
         'username' => 'aidaa',
         'email' => 'aidaa@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      Employee::create([
         'status' => 1,
         'port_id' => 20,
         'name' => 'Admin ARYANI-A',
         'username' => 'aryania',
         'email' => 'aryania@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      Employee::create([
         'status' => 1,
         'port_id' => 21,
         'name' => 'Admin CHESSY-A',
         'username' => 'chessya',
         'email' => 'chessya@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      Employee::create([
         'status' => 1,
         'port_id' => 22,
         'name' => 'Admin INDRI-A',
         'username' => 'indria',
         'email' => 'indria@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      // Employee::create([
      //    'port_id' => 23,
      //    'name' => 'Admin INTAN-A',
      //    'username' => 'intana',
      //    'email' => 'intana@pertamina.com',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // Employee::create([
      //    'port_id' => 24,
      //    'name' => 'Admin INTAN-AC',
      //    'username' => 'intanac',
      //    'email' => 'intanac@pertamina.com',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // Employee::create([
      //    'port_id' => 25,
      //    'name' => 'Admin INTAN-B',
      //    'username' => 'intanb',
      //    'email' => 'intanb@pertamina.com',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // Employee::create([
      //    'port_id' => 25,
      //    'name' => 'Admin INTAN-BPC',
      //    'username' => 'intanbpc',
      //    'email' => 'intanbpc@pertamina.com',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // User Platform NBU
      Employee::create([
         'status' => 1,
         'port_id' => 44,
         'name' => 'Admin FARIDA-A',
         'username' => 'faridaa',
         'email' => 'faridaa@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      Employee::create([
         'status' => 1,
         'port_id' => 45,
         'name' => 'Admin FARIDA-B',
         'username' => 'faridab',
         'email' => 'faridab@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      Employee::create([
         'status' => 1,
         'port_id' => 50,
         'name' => 'Admin KRISNA-A',
         'username' => 'krisnaa',
         'email' => 'krisnaa@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      Employee::create([
         'status' => 1,
         'port_id' => 51,
         'name' => 'Admin KRISNA-B',
         'username' => 'krisnaab',
         'email' => 'krisnab@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);


      // User Platform NBU
      Employee::create([
         'status' => 1,
         'port_id' => 73,
         'name' => 'Admin CINTA-A',
         'username' => 'cintaa',
         'email' => 'cintaa@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      Employee::create([
         'status' => 1,
         'port_id' => 74,
         'name' => 'Admin CINTA-B',
         'username' => 'cintab',
         'email' => 'cintab@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      Employee::create([
         'status' => 1,
         'port_id' => 92,
         'name' => 'Admin PABELOKAN ISLAND',
         'username' => 'pabelokan',
         'email' => 'pabelokan@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      Employee::create([
         'status' => 1,
         'port_id' => 93,
         'name' => 'Admin RAMA-A',
         'username' => 'ramaa',
         'email' => 'ramaa@pertamina.com',
         'ekstensi' => '111',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);



      // DB::table('employees')->insert([
      //    department_id' => 2,
      //    'port_id' => 1,
      //    'name' => 'Kalijapat 4',
      //    'email' => 'kj4@pertamina.com',
      //    'username' => 'kj4',
      //    'ekstensi' => '111',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    department_id' => 2,
      //    'port_id' => 2,
      //    'name' => 'Kalijapat 5',
      //    'email' => 'kj5@pertamina.com',
      //    'username' => 'kj5',
      //    'ekstensi' => '233',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'department_id' => 2,
      //    'port_id' => 3,
      //    'name' => 'Kali Kresek',
      //    'email' => 'kalikresek@gmail.com',
      //    'username' => 'kalikresek',
      //    'ekstensi' => '444',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'department_id' => 2,
      //    'port_id' => 4,
      //    'name' => 'COSL 221',
      //    'email' => 'c221@gmail.com',
      //    'username' => 'c221',
      //    'ekstensi' => '677',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);


      // DB::table('employees')->insert([
      //    'department_id' => 2,
      //    'port_id' => 1,
      //    'name' => 'Ahmad Juantoro',
      //    'username' => 'juan',
      //    'email' => 'juan@pertamina.com',
      //    'ekstensi' => '223',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('employees')->insert([
      //    'department_id' => 3,
      //    'port_id' => 1,
      //    'name' => 'Dareza Arvian',
      //    'username' => 'dareza',
      //    'email' => 'dareza@pertamina.com',
      //    'ekstensi' => '669',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);

      // DB::table('employees')->insert([
      //    'department_id' => 2,
      //    'port_id' => 4,
      //    'name' => 'Abdul Fikri',
      //    'username' => 'fikri',
      //    'email' => 'fikri@pertamina.com',
      //    'ekstensi' => '882',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
      // DB::table('employees')->insert([
      //    'department_id' => 2,
      //    'port_id' => 3,
      //    'name' => 'Ari Pratama',
      //    'username' => 'ari',
      //    'email' => 'ari@pertamina.com',
      //    'ekstensi' => '138',
      //    'created_at' => NOW(),
      //    'updated_at' => NOW()
      // ]);
   }
}
