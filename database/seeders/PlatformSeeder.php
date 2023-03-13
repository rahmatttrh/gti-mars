<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('platforms')->insert([
         'name' => 'ENC',
         'system' => 'DSP-ENC',
         'tagline' => 'Integrated Logistic',
         'email' => 'enc@gmail.com',
         'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam numquam eius doloremque.',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('platforms')->insert([
         'name' => 'Graha Segara',
         'system' => 'DSP-GS',
         'tagline' => 'Behandle Container',
         'email' => 'gs@gmail.com',
         'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam numquam eius doloremque.',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
      DB::table('platforms')->insert([
         'name' => 'Ekatama',
         'system' => 'DSP-WKATAMA',
         'tagline' => 'Trucking Delivery',
         'email' => 'ekatama@gmail.com',
         'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam numquam eius doloremque.',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}
