<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $table = 'subject';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'subject_name'
    ];
}
