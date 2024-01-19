<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudyDirection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudyDirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('directions')->insert([
            ['name'=>'Admin', 'code'=>'AD', 'password'=>Hash::make('1234')],
            ['name'=>'Informatyka', 'code'=>'II', 'password'=>Hash::make('1234')],
            ['name'=>'Matematyka', 'code'=>'MA', 'password'=>Hash::make('1234')],
            ['name'=>'Informatyka i Ekonometria', 'code'=>'IE', 'password'=>Hash::make('1234')],
            ['name'=>'Fizyka', 'code'=>'FI', 'password'=>Hash::make('1234')],
            ['name'=>'Rolnictwo', 'code'=>'RO', 'password'=>Hash::make('1234')],
        ]);
    }
}
