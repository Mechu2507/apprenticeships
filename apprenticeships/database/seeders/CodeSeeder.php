<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Code;
use Illuminate\Support\Facades\DB;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('codes')->insert([
            ['direction_id'=>2, 'code'=>'II3S123', 'active'=>true],
            ['direction_id'=>2, 'code'=>'II3S223', 'active'=>true],
            ['direction_id'=>2, 'code'=>'II3S122', 'active'=>false],
            ['direction_id'=>3, 'code'=>'MA2S123', 'active'=>true],
            ['direction_id'=>3, 'code'=>'MA2S122', 'active'=>false],
            ['direction_id'=>3, 'code'=>'MA2S223', 'active'=>true],
        ]);

    }
}
