<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance_list extends Model
{
    use HasFactory;
    public function subject(){
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }
    public function schedule(){
        return $this->belongsTo('App\Models\Teacher_schedule', 'schedule_id', 'id');
    }
}
