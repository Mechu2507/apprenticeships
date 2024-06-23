<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Direction;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Direction>
 */
class DirectionFactory extends Factory
{
    protected $model = Direction::class;

    protected static ?string $password;

    public function definition()
    {
        return [
            'id' => 1,
            'name' => 'test',
            'code' => 'II', 
            'password' => static::$password ??= Hash::make('password'),
            
            
        ];
    }
}
