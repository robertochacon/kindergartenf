<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $table = 'parents';

    protected $fillable = [
        'identification','name','last_name','gender','born_date','address','phone','residence_phone','work_phone','work_phone_ext','relationship','medications'
    ];
}
