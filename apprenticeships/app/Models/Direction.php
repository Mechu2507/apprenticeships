<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'code',
        'password',
    ];

    public function codes()
    {
        return $this->hasMany(Code::class, 'direction_id');
    }
}
