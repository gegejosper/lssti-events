<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function plan(){
        return $this->belongsTo('App\Models\Plan', 'plan_id', 'id');
    }
}
