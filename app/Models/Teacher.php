<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    public $table = 'reporting_teacher';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id','teacher_name'
    ];
}
