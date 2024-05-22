<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    use HasFactory;

    protected $fillable = [
        'direction',
        'name',
        'phone',
        'mail_ur',
        'mail_google',
        'table_shared',
        'form_link',
        'login_method'
    ];

    
}
