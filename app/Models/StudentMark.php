<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;
    public $table = 'students_mark';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'student_id','subject_id','mark','term'
    ];
}
