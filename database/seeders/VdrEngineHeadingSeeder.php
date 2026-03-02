<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VdrEngineHeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vdr_engine_headings')->insert([
            'description' => 'Engine Revolution',
            'unit' => 'RPM',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Oil Pressure',
            'unit' => 'Bar',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Inlet',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Outlet',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #1',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #2',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #3',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #4',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #5',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #6',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #7',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #8',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #9',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #10',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #11',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #12',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #13',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #14',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #15',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Coolant Temperature Cyl. #16',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Gear Box Oil Temperature',
            'unit' => 'C',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_engine_headings')->insert([
            'description' => 'Gear Box Oil Pressure',
            'unit' => 'Bar',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
