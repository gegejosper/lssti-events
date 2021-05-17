<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gate_attendance extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'date_log', 'time_log', 'log_type', 'log_count', 'status'];

    public function student(){
        return $this->belongsTo('App\Models\Student', 'student_id', 'id_number');
    }

    
}
