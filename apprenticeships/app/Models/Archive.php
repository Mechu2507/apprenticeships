<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_id',
        'student_name',
        'company_name',
        'company_address',
        'company_person',
        'position',
        'start_date',
        'end_date',
        'supervisor_name',
        'hours',
        'generated',
    ];

    public function code()
    {
        return $this->belongsTo(Code::class, 'code_id');
    }
}
