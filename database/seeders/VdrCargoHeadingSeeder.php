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
            'description' => 'Ltrs',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'FRESH WATER',
            'description' => 'Ltrs',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'DRILL WATER',
            'description' => 'Ltrs',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'BARITE',
            'description' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'BENTONITE',
            'description' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'CEMENT BLENDED',
            'description' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'CEMENT G',
            'description' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'BRINE',
            'description' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('vdr_cargo_headings')->insert([
            'description' => 'OTHERS',
            'description' => 'Cuft',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
