<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VdrWeatherHeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vdr_weather_headings')->insert([
            'heading' => 'Wind',
            'description' => 'Wind (Dir/speed)',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_weather_headings')->insert([
            'heading' => 'Sea',
            'description' => 'Sea (Wave Height)',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_weather_headings')->insert([
            'heading' => 'Visibility',
            'description' => 'Visibility',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
