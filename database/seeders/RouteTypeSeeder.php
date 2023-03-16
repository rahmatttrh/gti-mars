<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('route_types')->insert([
            'name' => 'Sea',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('route_types')->insert([
            'name' => 'Land',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('route_types')->insert([
            'name' => 'Air',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
