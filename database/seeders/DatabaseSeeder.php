<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info("-----------------------------------------------");
        $this->command->info("START of database seeder");
        $this->command->info("-----------------------------------------------");




        $this->call(ArduinoSeeder::class);
        $this->call(LogSeeder::class);

        $this->command->info("-----------------------------------------------");
        $this->command->info("END of database seeder");
        $this->command->info("-----------------------------------------------");
    }
}
