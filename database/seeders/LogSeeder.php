<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "id" => 1,
                "arduino_id" => 1,
                "temperature" => "26.20",
                "humidity" => "89.00",
                "soil_value" => "500",
                "soil_percentage" => "38",
                "created_at" => "2023-12-12 20:04:20",
                "updated_at" => "2023-12-12 20:04:20",
            ],
            [
                "id" => 2,
                "arduino_id" => 1,
                "temperature" => "26.20",
                "humidity" => "89.00",
                "soil_value" => "501",
                "soil_percentage" => "38",
                "created_at" => "2023-12-12 20:04:16",
                "updated_at" => "2023-12-12 20:04:16",
            ],
            [
                "id" => 3,
                "arduino_id" => 1,
                "temperature" => "26.30",
                "humidity" => "88.00",
                "soil_value" => "500",
                "soil_percentage" => "38",
                "created_at" => "2023-12-12 20:03:49",
                "updated_at" => "2023-12-12 20:03:49",
            ],
            [
                "id" => 4,
                "arduino_id" => 1,
                "temperature" => "26.20",
                "humidity" => "88.00",
                "soil_value" => "500",
                "soil_percentage" => "38",
                "created_at" => "2023-12-12 20:03:45",
                "updated_at" => "2023-12-12 20:03:45",
            ],
            [
                "id" => 5,
                "arduino_id" => 1,
                "temperature" => "26.20",
                "humidity" => "89.00",
                "soil_value" => "503",
                "soil_percentage" => "37",
                "created_at" => "2023-12-12 20:03:26",
                "updated_at" => "2023-12-12 20:03:26",
            ],
            [
                "id" => 6,
                "arduino_id" => 1,
                "temperature" => "26.30",
                "humidity" => "89.00",
                "soil_value" => "500",
                "soil_percentage" => "38",
                "created_at" => "2023-12-12 20:03:22",
                "updated_at" => "2023-12-12 20:03:22",
            ],
        ];

        DB::table('logs')->insert($data);
    }
}
