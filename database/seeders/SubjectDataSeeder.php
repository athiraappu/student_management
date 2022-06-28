<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectDataSeeder extends Seeder
{
	static $subjects = [
        'Maths',
        'Science',
        'History',
        'Computer'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$subjects as $subject) {
            DB::table('subject')->insert([
                'subject_name' => $subject
            ]);
        }
    }
}
