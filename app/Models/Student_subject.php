<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_subject extends Model
{
    use HasFactory;

    public function subject(){
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'teacher_id', 'id');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }

    public function schedule(){
        return $this->belongsTo('App\Models\Teacher_schedule', 'schedule_id', 'id');
    }
    public function schoolyear(){
        return $this->belongsTo('App\Models\School_year', 'school_year', 'id');
    }
    public function attendances(){
        return $this->hasMany('App\Models\Subject_attendance', 'student_id', 'student_id');
    }
}
