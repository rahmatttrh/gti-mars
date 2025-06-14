<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('offices')->insert([
         'name' => 'SKJ',
         'code' => 'elpi',
         'username' => 'elpi-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('offices')->insert([
         'name' => 'SKJ',
         'code' => 'skj',
         'username' => 'skj-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('offices')->insert([
         'name' => 'TGM',
         'code' => 'tgm',
         'username' => 'tgm-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('offices')->insert([
         'name' => 'PEIP',
         'code' => 'peip',
         'username' => 'peip-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('offices')->insert([
         'name' => 'RAS',
         'code' => 'ras',
         'username' => 'ras-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('offices')->insert([
         'name' => 'LSM',
         'code' => 'lsm',
         'username' => 'lsm-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('offices')->insert([
         'name' => 'BRL',
         'code' => 'brl',
         'username' => 'brl-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('offices')->insert([
         'name' => 'NMS',
         'code' => 'nms',
         'username' => 'nms-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('offices')->insert([
         'name' => 'PMWP',
         'code' => 'pmwp',
         'username' => 'pmwp-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('offices')->insert([
         'name' => 'PTK',
         'code' => 'ptk',
         'username' => 'ptk-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('offices')->insert([
         'name' => 'WOM',
         'code' => 'wom',
         'username' => 'wom-oses',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
    }
}
