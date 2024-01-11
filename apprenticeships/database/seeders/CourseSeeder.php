<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\password;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('courses')->insert([
            ['name'=>'Admin', 'code'=>'AD', 'password'=>bcrypt('1234')],
            ['name'=>'Informatyka', 'code'=>'II', 'password'=>bcrypt('1234')],
            ['name'=>'Matematyka', 'code'=>'MA', 'password'=>bcrypt('1234')],
            ['name'=>'Informatyka i Ekonometria', 'code'=>'IE', 'password'=>bcrypt('1234')],
            ['name'=>'Fizyka', 'code'=>'FI', 'password'=>bcrypt('1234')],
            ['name'=>'Rolnictwo', 'code'=>'RO', 'password'=>bcrypt('1234')],
        ]);
    }
}
