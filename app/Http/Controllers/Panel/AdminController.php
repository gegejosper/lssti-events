<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Application;
use App\Models\User;
use App\Models\Role;
use App\Models\Plan;
use App\Models\Package;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $page_name = 'Dashboard';

        return view('panel.admin.dashboard',compact('page_name'));
    }
    public function applications(){
        $page_name = 'Applications';
        $applications = Application::orderBy('status', 'desc')->paginate(20);
        return view('panel.admin.applications',compact('page_name', 'applications'));
    }
    public function employees(){
        $page_name = 'Employees';
        $employees = Employee::get();
        return view('panel.admin.employees',compact('page_name', 'employees'));
    }
    public function packages(){
        $page_name = 'Packages';
        $packages= Package::with('plan')->get();
        $plans = Plan::where('status', 'active')->get();
        return view('panel.admin.packages',compact('page_name', 'packages', 'plans'));
    }
    public function plans(){
        $page_name = 'Plans';
        $plans = Plan::get();
        return view('panel.admin.plans',compact('page_name', 'plans'));
    }
    public function products(){
        $page_name = 'Products';
        return view('panel.admin.products',compact('page_name'));
    }
    public function settings(){
        $page_name = 'Settings';
        $settings = Setting::first();
        //dd($settings);
        return view('panel.admin.settings',compact('page_name', 'settings'));
    }
    public function subscribers(){
        $page_name = 'Subscribers';
        
        return view('panel.admin.subscribers',compact('page_name'));
    }
    public function users(){
        $page_name = 'Users';
        $users = User::with('roles')->paginate(10);
        $roles = Role::where('name', '!=', 'member')->get();
//dd($users);
        return view('panel.admin.users',compact('page_name', 'users', 'roles'));
    }
}
