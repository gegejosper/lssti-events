<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    //
    public function dashboard(){
        $page_name = 'Dashboard';
        return view('panel.admin.dashboard',compact('page_name'));
    }
}
