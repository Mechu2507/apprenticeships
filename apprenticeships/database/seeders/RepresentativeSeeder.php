<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepresentativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('representatives')->insert([
            ['name'=>'Pani dr hab. Marta Łuszczak - Dziekan Kolegium Nauk Przyrodniczych'],
            ['name'=>'Pani prof. dr hab. Idali Kasprzyk - Prorektor ds. Kolegium Nauk Przyrodniczych'],
        ]);

    }
}
