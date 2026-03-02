<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayloadTypeSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      //
      DB::table('payload_types')->insert([
         'code' => 'CRG',
         'description' => 'Material Cargo',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('payload_types')->insert([
         'code' => 'PSR',
         'description' => 'Passenger',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      DB::table('payload_types')->insert([
         'code' => 'CRW',
         'description' => 'CREW',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
