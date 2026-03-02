<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogisticSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('logistics')->insert([
         'name' => 'Barang 1',
         'weight' => 100,
         'size' => 80,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('logistics')->insert([
         'name' => 'Barang 2',
         'weight' => 230,
         'size' => 110,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('logistics')->insert([
         'name' => 'Barang 3',
         'weight' => 90,
         'size' => 50,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('logistics')->insert([
         'name' => 'Barang 4',
         'weight' => 25,
         'size' => 12,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('logistics')->insert([
         'name' => 'Barang 5',
         'weight' => 55,
         'size' => 20,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('logistics')->insert([
         'name' => 'Barang 6',
         'weight' => 70,
         'size' => 45,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('logistics')->insert([
         'name' => 'Barang 7',
         'weight' => 50,
         'size' => 25,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
