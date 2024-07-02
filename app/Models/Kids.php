<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kids extends Model
{
    use HasFactory;

    protected $table = 'kids';

    protected $casts = [
        'fathers' => 'array',
        'tutors' => 'array',
    ];

    protected $fillable = [
        'id','name','last_name','gender','born_date','address','insurance','insurance_number','allergies','medical_conditions','medications','image','fathers','tutors'
    ];
}
