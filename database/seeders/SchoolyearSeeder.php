<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Students_schoolyear;
use App\Models\School_year;

class SchoolyearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $students = Student::take(10)->get();
        $sc = School_year::where('status', 'active')->latest()->first();
        foreach($students as $student){
            $sc_students = new Students_schoolyear();
            $sc_students->schoolyear = '2020-2021';  
            $sc_students->semester ='1st Semester';  
            $sc_students->student_id =$student->id;  
            $sc_students->section_id =$student->section; 
            $sc_students->status= 'active';   
            $sc_students->save();   
        }
    }
}
