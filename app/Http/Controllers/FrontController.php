<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function apply(){
        return view('apply');
    }
}

