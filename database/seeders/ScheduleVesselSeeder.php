<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleVesselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Giat Jaya
        DB::table('schedule_vessels')->insert([
            'vessel_id' => 11,
            'monday_id' => 1,
            'tuesday_id' => 12,
            'friday_id' => 12,
            'saturday_id' => 1,
            'sunday_id' => 12,

            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
