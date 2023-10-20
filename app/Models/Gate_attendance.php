<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gate_attendance extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo('App\Models\Student', 'student_id', 'id_number');
    }
    public function event_detail(){
        return $this->belongsTo('App\Models\Event', 'event', 'id');
    }
}
