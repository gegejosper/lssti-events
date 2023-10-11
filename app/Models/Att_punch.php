<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Att_punch extends Model
{
    use HasFactory;
    protected $table = 'att_punches';
    public $timestamps = false;

    public function student(){
        return $this->belongsTo('App\Models\Student', 'employee_id', 'id');
    }
}
