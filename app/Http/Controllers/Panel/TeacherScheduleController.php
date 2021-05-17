<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher_schedule;
use App\Models\Schedule_day;
use Response;
use Validator;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\School_year;
use App\Models\Student_subject;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class TeacherScheduleController extends Controller
{
    //
    public function user_id(){
        if (Auth::check()){
            $user_id = Auth::user()->id;
            
            return $user_id;    
        }
        
    }
    public function add_schedule(Request $req){
        //dd($req);
        $user_id = $this->user_id();
        $teacher = Teacher::where('user_id', $user_id)->first();
        $school_year = School_year::where('status', 'active')->first();
        $subject = Subject::find($req->subject);
        $schedule = new Teacher_schedule();
        $schedule->teacher_id = $teacher->id;
        $schedule->subject_id = $req->subject;
        $schedule->school_year_id = $school_year->id;
        $schedule->subject_time = $req->subject_time;
        $schedule->subject_days = json_encode($req->subject_days);
        $schedule->status = 'active';
        $schedule->save();
        $schedule->subject_name = $subject->name;
        $schedule->semester = $school_year->semester;
        $schedule->year = $school_year->cy;

        foreach($req->subject_days as $day){
            $days = new Schedule_day();
            $days->schedule_id = $schedule->id;
            $days->schedule_day = $day;
            $days->save();
        }

        return response()->json($schedule);
    }

    public function modify_schedule(Request $req){
        $data = Teacher_schedule::find($req->schedule_id);
        $data->status = $req->schedule_status;
        $data->save();
        return response()->json($data);
    }

    public function view_schedule($schedule_id){
        $page_name = 'Schedule';
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
        
        $schedule = Teacher_schedule::with('subject','days')->where('id', $schedule_id)->first(); 
        
        $students = Student_subject::with('student')
        ->with(['attendances' => function($query) use ($date_today, $date_year, $date_month, $schedule_id){
            $query->where('log_year', $date_year);
            $query->where('log_day', number_format($date_today,0));
            $query->where('log_month', number_format($date_month,0));
            $query->where('schedule_id', $schedule_id);
        }])
        ->where('schedule_id', $schedule_id)->get();
        //dd($students);
        $schedules = $schedule->days;
        $found_day = false;
        
        $days = array();
        foreach($schedule->days as $day){
            array_push($days, $day->schedule_day);
            if($today_day == $day->schedule_day){
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
        $days_list = getWeekdays($date_month,$date_year, $days);
        //dd($days_list);
        return view('panel.teacher.schedule', compact('page_name', 'schedule', 'days_list', 'found_day', 'students', 'schedule_id', 'date_month', 'date_year'));
    }
}
