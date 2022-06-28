<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $table = 'student_master';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'name','age','gender','reporting_id'
    ];
}
