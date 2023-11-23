<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VdrHseHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vdr_hse_headers')->insert([
            'description' => 'O & I Card Submission (e.g, PINTER, STOP, etc)',
            'group_header' => 'A',
            'io' => 'i',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_hse_headers')->insert([
            'description' => 'Ijin Kerja / PTW issued)',
            'group_header' => 'A',
            'io' => 'i',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_hse_headers')->insert([
            'description' => 'Tool Box Talk',
            'group_header' => 'A',
            'io' => 'i',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_hse_headers')->insert([
            'description' => 'HSSE Induction (New Corner & Visitor)',
            'group_header' => 'A',
            'io' => 'i',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_hse_headers')->insert([
            'description' => 'Emergency Drills',
            'group_header' => 'A',
            'io' => 'i',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_hse_headers')->insert([
            'description' => 'Internal Audit (by Office)',
            'group_header' => 'A',
            'io' => 'i',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_hse_headers')->insert([
            'description' => 'Safe Manhours Worked (Vessel Crew)',
            'group_header' => 'B',
            'io' => 'o',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        $heading = DB::table('vdr_hse_headers')->insert([
            'description' => 'Number of Accident/Incident',
            'group_header' => 'B',
            'io' => 'o',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_hse_headers')->insert([
            'description' => 'Lost Time Injury',
            'group_header' => 'B',
            'io' => 'o',
            'is_header' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_hse_headers')->insert([
            'description' => 'Medical Treatment Case',
            'group_header' => 'B',
            'io' => 'o',
            'is_header' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_hse_headers')->insert([
            'description' => 'First Aid Case',
            'group_header' => 'B',
            'io' => 'o',
            'is_header' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_hse_headers')->insert([
            'description' => 'Others',
            'group_header' => 'B',
            'io' => 'o',
            'is_header' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
