<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'direction_id',
        'code',
        'active',
        'year',
        'degree',
        'mode',
    ];

    public function direction()
    {
        return $this->belongsTo(Direction::class, 'direction_id');
    }
    
    public function actives()
    {
        return $this->hasMany(Active::class, 'code_id');
    }

}
