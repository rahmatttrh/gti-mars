<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VdrOperatingHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vdr_operating_headers')->insert([
            'description' => 'High Speed (High)',
            'field' => 'high',
            'speed' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_operating_headers')->insert([
            'description' => 'Normal Speed (Normal)',
            'field' => 'normal',
            'speed' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_operating_headers')->insert([
            'description' => 'Slow Speed (Slow)',
            'field' => 'slow',
            'speed' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_operating_headers')->insert([
            'description' => 'Maneuvering (Manu) - Including D',
            'field' => 'manu',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_operating_headers')->insert([
            'description' => 'Idle',
            'field' => 'idle',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_operating_headers')->insert([
            'description' => 'Towing',
            'field' => 'tow',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_operating_headers')->insert([
            'description' => 'Anchor Handling (A/H)',
            'field' => 'ah',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_operating_headers')->insert([
            'description' => 'Standby (S/B)',
            'field' => 'sb',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_operating_headers')->insert([
            'description' => 'Maintenance',
            'contractual' => '0',
            'daily' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_operating_headers')->insert([
            'description' => 'Down Time',
            'contractual' => '0',
            'daily' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
