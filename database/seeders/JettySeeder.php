<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JettySeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('jetties')->insert([
         'port_id' => 1,
         'name' => 'Jetty 4A',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('jetties')->insert([
         'port_id' => 1,
         'name' => 'Jetty 4B',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('jetties')->insert([
         'port_id' => 1,
         'name' => 'Jetty 4C',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('jetties')->insert([
         'port_id' => 2,
         'name' => 'Jetty 2A',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('jetties')->insert([
         'port_id' => 2,
         'name' => 'Jetty 2B',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
