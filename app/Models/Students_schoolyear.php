<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students_schoolyear extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }

    public function section_info(){
        return $this->belongsTo('App\Models\Section', 'section_id', 'id');
    }
}
