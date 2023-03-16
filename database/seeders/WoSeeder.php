<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wos')->insert([
            'party_id' => 4,
            'schedule_id' => 6,
            'payloadtype_id' => 1,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
