<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id',
        'name',
    ];

    public function actives()
    {
        return $this->hasMany(Active::class, 'state_id');
    }
}
