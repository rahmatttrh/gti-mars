<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert([
            'wo_id' => 1,
            'doc_no' => '15423',
            'description' => 'Chemical Test',
            'qty' => '2',
            'unit' => 'Unit',
            'ton' => '1.2',
            'm3' => '5.4',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
