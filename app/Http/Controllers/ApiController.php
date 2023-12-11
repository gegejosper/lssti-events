<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gate_attendance;
use App\Models\Setting;
use App\Models\Student;

class ApiController extends Controller
{
    //
    public function save_student_attendance(Request $req){
        $log_time = $pieces = explode(" ", $req->log_time);
        $date_log = $log_time[0];
        $time_log = $log_time[1];
        $event_id = $req->event_id;
        $id_number = $req->id_number;
        $setting = Setting::first();
        $log_count = $req->log_type;
        
        switch ($log_count) {
            case 0:
              $log_type="login";
              $log_mesage="login";
              $status = 'logged in';

              
              break;
            case 1:
                $log_type="logout";
                $log_mesage="logout";
                $status = 'logged out';
              break;
            default:
                $log_type="unidentified";
                $log_mesage="unidentified";
                $status="unidentified";
        }
        
        $count_log = Gate_attendance::where('date_log', $date_log)
            ->where('student_id', $id_number)
            ->where('log_count', $log_count)
            ->where('event', $event_id)
            ->count();
        if($count_log == 0){
            $student = Student::where('id_number', $req->id_number)->first();
            $attendance = new Gate_attendance();
            $attendance->student_id = $req->id_number;
            $attendance->course = $student->course;
            $attendance->year = $student->year;
            $attendance->block = $student->block;
            $attendance->event = $event_id;
            $attendance->date_log = $date_log;
            $attendance->time_log = $time_log;
            $attendance->log_type = $log_type;
            $attendance->log_count = $count_log;
            $attendance->status = $status;
            $attendance->save();
            return response()->json([
                "message" => "student record created"
            ], 201);
        }
        else {
            return response()->json([
                "message" => "student already logged"
            ], 201);
        }
        
    }

    public function show_log_students(){
        $attendance = Gate_attendance::all();
        return $attendance;
    }
}
