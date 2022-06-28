<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportingTeacherTableSeeder extends Seeder
{
	static $teachers = [
        'Katie',
        'Max',
        'Robin',
        'Mathew'
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$teachers as $teacher) {
            DB::table('reporting_teacher')->insert([
                'teacher_name' => $teacher
            ]);
        }
    }
}
