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

        // Elok Jaya
        DB::table('schedule_vessels')->insert([
            'vessel_id' => 9,
            'monday_id' => 1,
            'tuesday_id' => 12,
            'wednesday_id' => 1,
            'thursday_id' => 12,
            'sunday_id' => 12,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        // Sigap jaya
        DB::table('schedule_vessels')->insert([
            'vessel_id' => 6,
            'sunday_id' => 1,
            'tuesday_id' => 13,
            'wednesday_id' => 12,
            'thursday_id' => 18,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        // Tegas jaya
        DB::table('schedule_vessels')->insert([
            'vessel_id' => 35,
            'sunday_id' => 1,
            'tuesday_id' => 13,
            'wednesday_id' => 12,
            'thursday_id' => 18,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
