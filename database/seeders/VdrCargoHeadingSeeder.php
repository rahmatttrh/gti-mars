<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VdrCargoHeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vdr_cargo_headings')->insert([
            'description' => 'FUEL OIL',
            'unit' => 'Ltrs',
            'is_consumption' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'FRESH WATER',
            'unit' => 'Ltrs',
            'is_consumption' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'DRILL WATER',
            'unit' => 'Ltrs',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'BARITE',
            'unit' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'BENTONITE',
            'unit' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'CEMENT BLENDED',
            'unit' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'CEMENT G',
            'unit' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'BRINE',
            'unit' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'OTHERS',
            'unit' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
