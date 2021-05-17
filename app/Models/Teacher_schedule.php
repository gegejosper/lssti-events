<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_schedule extends Model
{
    use HasFactory;

    public function subject(){
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }

    public function student_schedule(){
        return $this->hasMany('App\Models\Student_subject', 'schedule_id', 'id');
    }

    public function schoolyear(){
        return $this->belongsTo('App\Models\School_year', 'school_year_id', 'id');
    }
    public function days(){
        return $this->hasMany('App\Models\Schedule_day', 'schedule_id', 'id');
    }
    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'teacher_id', 'id');
    }
}
