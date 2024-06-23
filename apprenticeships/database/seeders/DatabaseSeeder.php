<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(StudyDirectionSeeder::class);
        $this->call(CodeSeeder::class);
        $this->call(RepresentativeSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(SpecializationSeeder::class);
    }
}
