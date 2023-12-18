<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArduinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "id"=>1,
                "imei" => "f412fa654a10",
                "is_water_active" => 1,
                "created_at" => "2023-12-10 09:04:33",
                "updated_at" => "2023-12-12 23:34:54",
            ],
            // ... (You can add more entries following the same structure)
        ];

        // Insert data into the 'arduinos' table
        DB::table('arduinos')->insert($data);
    }
}
