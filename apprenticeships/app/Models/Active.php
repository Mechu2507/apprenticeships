<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_id',
        'student_name',
        'MrMs',
        'company_name',
        'company_address',
        'company_person',
        'position',
        'start_date',
        'end_date',
        'supervisor_name',
        'hours',
        'generated',
        'state_id',
        'index',
        'address',
        'phone',
        'email',
        'for_signature',
        'mail_date',
        'envelope_date',
        'self_collection',
        'return'
    ];

    public function code()
    {
    return $this->belongsTo(Code::class, 'code_id');
    }

    public function state()
    {
    return $this->belongsTo(State::class, 'state_id');
    }
    
}
