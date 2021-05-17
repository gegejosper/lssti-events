<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function student_am_login(){
        return $this->belongsTo('App\Models\Gate_attendance', 'id_number', 'student_id');
    }
    public function student_am_logout(){
        return $this->belongsTo('App\Models\Gate_attendance', 'id_number', 'student_id');
    }

    public function student_pm_login(){
        return $this->belongsTo('App\Models\Gate_attendance', 'id_number', 'student_id');
    }
    public function student_pm_logout(){
        return $this->belongsTo('App\Models\Gate_attendance', 'id_number', 'student_id');
    }
}
