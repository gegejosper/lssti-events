<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Att_punch;
use App\Models\Logtype;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    //

    protected $url = 'http://lsstievents.com';
    
    public function apply(){
        return view('apply');
    }
    public function index(){
        $students = Att_punch::with('student')->where('status', 0)->take(1)->get();
        $logtype = Logtype::first();
        foreach($students as $student_info){
            $response = Http::post($this->url.'/api/save_student_attendance', [
                'id_number' => $student_info->student->emp_pin,
                'log_time' => $student_info->punch_time,
                'log_type' => $logtype->log_type,
            ]);
            $updateAtt_punch_data = Att_punch::where('id', '=', $student_info->id)
                ->update(['status' => '1']);
        }
        
        return view('welcome', compact('logtype'))->with('success','Attendance list updated.');
    }
    public function update_log_type($logtype){
        $update_log_type = Logtype::where('id', '=', 1)
            ->update(['log_type' => $logtype]);
        return redirect()->back()->with('success','Attendance logtype updated');
    }
}

