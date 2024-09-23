<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('specializations')->insert([
            ['letter' => null, 'name' => 'Brak specjalizacji',],
            ['letter' => 'A', 'name' => 'Analiza i bezpieczeństwo danych',],
            ['letter' => 'B', 'name' => 'Zastosowania matematyki w finansach',]
        ]);
    }
}