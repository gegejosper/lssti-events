<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher_schedule;
use App\Models\Student_subject;
use App\Models\Student;
use App\Models\Subject_attendance;
use Illuminate\Support\Facades\Auth;

class StudentPanelController extends Controller
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
        return view('panel.student.dashboard', compact('page_name'));
    }
    public function schedules(){
        $page_name = 'Schedules';
        $user_id = $this->user_id();
        $student = Student::where('user_id', $user_id)->first();
        $student_id = $student->id;
        $schedules = Teacher_schedule::with('subject', 'teacher')
        ->with(['student_schedule' => function($query) use ($student_id){
            $query->where('student_id', $student_id);
        }])
        ->where('status', 'active')->get();
        //dd($schedules);
        return view('panel.student.schedules', compact('page_name', 'schedules'));
    }

    public function attendance(){
        $page_name = 'Attendance';
        $user_id = $this->user_id();
        $student = Student::where('user_id', $user_id)->first();
        $subjects = Student_subject::with('subject', 'teacher', 'schedule', 'schoolyear')->where('student_id', $student->id)->get();
        //dd($subjects);
        return view('panel.student.attendance', compact('page_name', 'subjects'));
    }
    public function view_attendance($schedule_id){
        $page_name = 'Schedule';
        $date_today = date('D');
        $date_month = date('m');
        $user_id = $this->user_id();
        $student_info = Student::where('user_id', $user_id)->first();
        //dd($student_info);
        $date_year = date('Y');
        $schedule = Teacher_schedule::with('subject','days')->where('id', $schedule_id)->first(); 
        
        $student = Student_subject::where('student_id', $student_info->id)->with('student')
        ->with(['attendances' => function($query) use ($date_today, $date_year, $date_month, $schedule_id){
            $query->where('log_year', $date_year);
            $query->where('log_day', number_format(date('d'),0));
            $query->where('log_month', number_format(date('m'),0));
            $query->where('schedule_id', $schedule_id);
        }])
        ->where('schedule_id', $schedule_id)->first();
        //dd($student);
        $schedules = $schedule->days;
        $found_day = false;
        
        $days = array();
        foreach($schedule->days as $day){
            array_push($days, $day->schedule_day);
            if($date_today == $day->schedule_day){
                $day_now = $day->schedule_day;
                $found_day = true;
                break;
            }  
        }
        function getWeekdays($m, $y = NULL, $days){
            $arrDtext = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri');

            if(is_null($y) || (!is_null($y) && $y == ''))
                $y = date('Y');

            $d = 1;
            $timestamp = mktime(0,0,0,$m,$d,$y);
            $lastDate = date('t', $timestamp);
            $workingDays = 0;
            $schedule_days = array();
            for($i=$d; $i<=$lastDate; $i++){
                if(in_array(date('D', mktime(0,0,0,$m,$i,$y)), $arrDtext)){
                    $workingDays++;
                    //echo date('D', mktime(0,0,0,$m,$i,$y)).'-'.date('d', mktime(0,0,0,$m,$i,$y));
                    $day_date = date('D', mktime(0,0,0,$m,$i,$y));
                    $day_date_num = date('d', mktime(0,0,0,$m,$i,$y));
                    
                    if(in_array($day_date, $days)) {
                        $subject_days = array();
                        $subject_days['date_day'] = $day_date;
                        $subject_days['day_date_num'] = $day_date_num;
                        array_push($schedule_days, $subject_days);
                        //echo $day_date."<br />";
                    }
                }
            }
            return $schedule_days;
        }
        $days_list = getWeekdays(date('m'),date('Y'), $days);
        //dd($days_list);
        return view('panel.student.attendance-view', compact('page_name', 'schedule', 'days_list', 'found_day', 'student', 'schedule_id', 'date_month', 'date_year'));
    }
    public function check_present(Request $req){
        $present = Subject_attendance::where('schedule_id', $req->schedule_id)
            ->where('log_year', $req->date_year)
            ->where('log_month', $req->date_month)
            ->where('log_day', $req->date_num)
            ->where('student_id', $req->student_id)
            ->count();
        $result=array( "count"=>$present, "student_id"=>$req->student_id,"date_num"=>$req->date_num,'date_month' => $req->date_month,'schedule_id' => $req->schedule_id);
        //dd($result);
        return response()->json($result);
    }

    public function process_enroll(Request $req){
        $user_id = $this->user_id();
        $student = Student::where('user_id', $user_id)->first();
    
        $schedule = Teacher_schedule::find($req->schedule_id);
        $enroll = new Student_subject();
        $enroll->subject_id = $schedule->subject_id;
        $enroll->student_id = $student->id;
        $enroll->teacher_id = $schedule->teacher_id;
        $enroll->school_year = $schedule->school_year_id;
        $enroll->schedule_id = $req->schedule_id;
        $enroll->status = 'pending';
        $enroll->save();
    }
}
