<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    //
    public function new_application(Request $req){
        return view('admin.new_application');
    }
}
