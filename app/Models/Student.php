<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'student_name', 'class', 'roll_no', 'mobile_no', 'admission_nom', 'section',
    ];

}
?>