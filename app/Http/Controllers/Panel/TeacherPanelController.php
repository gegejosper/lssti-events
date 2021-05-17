<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher_schedule;
use App\Models\Schedule_day;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\School_year;
use App\Models\Student_subject;
use App\Models\Subject_attendance;
use App\Models\Setting;

use Illuminate\Support\Facades\Auth;

class TeacherPanelController extends Controller
{
    //
    public function user_id(){
        if (Auth::check()){
            $user_id = Auth::user()->id;
            return $user_id;    
        }
        
    }
    public function dashboard(){
        $page_name = 'Dashboard';
        return view('panel.teacher.dashboard', compact('page_name'));
    }

    public function schedules(){

        $user_id = $this->user_id();
        $teacher = Teacher::where('user_id', $user_id)->first();
        $page_name = 'Schedules';
        $subjects = Subject::where('status', 'active')->get();
        $schedules = Teacher_schedule::with('days')->where('teacher_id', $teacher->id)->get(); 
        return view('panel.teacher.schedules', compact('page_name', 'schedules', 'subjects'));
    }
    

    public function requests(){
        $page_name = 'Requests';
        $user_id = $this->user_id();
        $teacher = Teacher::where('user_id', $user_id)->first();
        $requests = Student_subject::with('subject', 'student', 'schedule', 'schoolyear')->where('teacher_id', $teacher->id)->where('status', 'pending')->get();
        return view('panel.teacher.requests', compact('page_name', 'requests'));
    }

    public function attendance(){
        $page_name = 'Attendance';
        return view('panel.teacher.attendance', compact('page_name'));
    }

    public function reports(){
        $page_name = 'Reports';
        return view('panel.teacher.reports', compact('page_name'));
    }

    public function approve_enroll(Request $req){
        $data = Student_subject::find($req->schedule_id);
        $data->status = 'approved';
        $data->save();
        return response()->json($data);
    }
    public function present_student(Request $req){

        $setting = Setting::first();
        if($setting->use_system_date == 'yes'){
            $today_date = $setting->system_date;
            $log_time = $pieces = explode("-", $today_date);
            $date_today = $log_time[2];
            $date_month = $log_time[1];
            $date_year = $log_time[0];
            $today_day = date('D', strtotime($today_date));
        }
        else {
            $date_today = date('d');
            $date_month = date('m');
            $date_year = date('Y');
            $today_day = date('D');
        }
        $schedule = Teacher_schedule::with('subject','days')->where('id', $req->schedule_id)->first(); 
        
        $attendance = new Subject_attendance();
        $attendance->school_year = $schedule->school_year_id;
        $attendance->student_id = $req->student_id;
        $attendance->subject_id = $schedule->subject_id;
        $attendance->teacher_id = $schedule->teacher_id;
        $attendance->attendance_record = 'n/a';
        $attendance->log_time = 'n/a';
        $attendance->status = 'present';
        $attendance->schedule_id = $schedule->id;
        $attendance->log_year = $date_year;
        $attendance->log_day = number_format($date_today,0);
        $attendance->log_month = number_format($date_month,0);
        $attendance->save();
        return response()->json($attendance);
    }
    public function check_present(Request $req){
        //dd($req);
        
        $present = Subject_attendance::where('schedule_id', $req->schedule_id)
            ->where('log_year', $req->date_year)
            ->where('log_month', $req->date_month)
            ->where('log_day', $req->date_num)
            ->where('student_id', $req->student_id)
            ->count();
        //return response()->json($present);
        // $result = array();
        // $result->count = $present;
        // $result->student_id = $req->student_id;
        // $result->date_num = $req->date_num;

        $result=array( "count"=>$present, "student_id"=>$req->student_id,"date_num"=>$req->date_num,'date_month' => $req->date_month,'schedule_id' => $req->schedule_id);
        return response()->json($result);
    }
}
