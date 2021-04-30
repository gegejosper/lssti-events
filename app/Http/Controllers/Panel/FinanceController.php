<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    //
    public function dashboard(){
        $page_name = 'Dashboard';
        //dd(Auth::user());
        return view('panel.admin.dashboard',compact('page_name'));
    }
}
