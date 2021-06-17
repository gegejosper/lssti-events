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
use App\Models\Attendance_setup;
use App\Models\Attendance_list;
use App\Exports\StudentSubjectExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $user_id = $this->user_id();
        $school_years = School_year::all();
        $attendance_lists = Attendance_list::with('subject', 'schedule')->latest()->get();
        $teacher = Teacher::where('user_id', $user_id)->first();
        $schedules = Teacher_schedule::with('days')->where('teacher_id', $teacher->id)->get(); 
        return view('panel.teacher.attendance', compact('page_name', 'teacher', 'schedules', 'school_years','attendance_lists'));
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
    public function late_student(Request $req){

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
        $attendance->status = 'late';
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

    public function show_attendance(Request $req){

        $page_name = 'View Attendance';
        $setting = Setting::first();
        $school_setting = Attendance_setup::first();
        $date_today = date('d');
        $date_month = $req->month;
        $date_year = $req->year;
        $today_day = date('D');
        $schedule_id = $req->schedule;
        $schedule = Teacher_schedule::with('subject','days')->where('id', $req->schedule)->first(); 
        
        // $students = Student_subject::with('student')
        // ->where('schedule_id', $req->schedule)->get();
        $students = [];
        $students_male = Student_subject::leftJoin('students', 'students.id', '=', 'student_subjects.student_id')->orderBy('students.last_name')->where('gender', 'MALE')->where('schedule_id', $req->schedule)->get();

        $students_female = Student_subject::leftJoin('students', 'students.id', '=', 'student_subjects.student_id')->orderBy('students.last_name')->where('gender', 'FEMALE')->where('schedule_id', $req->schedule)->get();
        array_push($students,$students_male);
        array_push($students,$students_female);
        //$students->add($students_female);
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
        return view('panel.teacher.attendance-view', compact('page_name', 'schedule', 'days_list', 'found_day', 'students', 'schedule_id', 'date_month', 'date_year', 'school_setting'));
    }
    public function export_attendance($date_month,$date_year,$schedule_id) {

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setCoordinates('A1');
        $drawing->setPath('assets/media/deped2.png');
        $drawing->setHeight(100);

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath('assets/media/deped.png');
        $drawing->setCoordinates('B15');
        $drawing->setHeight(100);
        $spreadsheet = new Spreadsheet();
        $sheet = $drawing->setWorksheet($spreadsheet->getActiveSheet());
        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');

        $schedule = Teacher_schedule::with('subject','days')->where('id', $schedule_id)->first(); 
        return Excel::download(new StudentSubjectExport($schedule_id, $date_month, $date_year), $schedule->subject->name.'-attendance-'.$date_month.'-'.$date_year.'.xlsx');
    }
    public function getWeekdays($m, $y = NULL){
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
                $day_date = date('D', mktime(0,0,0,$m,$i,$y));
                $day_date_num = date('d', mktime(0,0,0,$m,$i,$y));
                $subject_days = array();
                $subject_days['date_day'] = $day_date;
                $subject_days['day_date_num'] = $day_date_num;
                array_push($schedule_days, $subject_days);
            }
        }
        return $schedule_days;
    }
    public function save_data($date_month,$date_year,$schedule_id) {
        // $schedule_id = 5;
        // $date_month =5;
        // $date_year=2021;
        $days_list = $this->getWeekdays($date_month, $date_year);
        $days = array();
        $d = 0; 
        $spreadsheet = new Spreadsheet();
        foreach($days_list as $day){
            //$day_info = $day['date_day'].'/'.$day['day_date_num'];
            array_push($days, substr($day['date_day'], 0, 1));
           
        }
        $range1 = range("F", "Z");
        foreach ($range1 as $letter) {
            //print("$letter$i\n");
            $number = $letter.'11';
            //echo $number;
            $spreadsheet->getActiveSheet()->setCellValue($number, $days[$d]);
            $d++;
        }
        // $spreadsheet->getActiveSheet()->setCellValue('F'.$d, 'Present');
        // $d++;
        // $spreadsheet->getActiveSheet()->setCellValue('F'.$d, 'Tardy');
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setCoordinates('A1');
        $drawing->setPath('assets/media/deped2.png');
        $drawing->setHeight(100);

        $drawing2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing2->setName('Logo');
        $drawing2->setDescription('Logo');
        $drawing2->setPath('assets/media/deped.png');
        $drawing2->setCoordinates('AW1');
        $drawing2->setHeight(100);
        
        $spreadsheet->getActiveSheet()->mergeCells('A1:AY1');
        $spreadsheet->getActiveSheet()->setCellValue('A1', 'School Form 2 Daily Attendance Report of Learners  for Senior High School (SF2-SHS)');
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 15,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        
        $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
        //$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $range = range("F", "Z");
        for ($i=1; $i<=1; $i++) {
            foreach ($range as $letter) {
              //print("$letter$i\n");
              $number = $letter.''.$i;
              //echo $number;
              $spreadsheet->getActiveSheet()->getColumnDimension($letter)->setWidth(3);
            }
        }
        $range2 = range("A", "A");
        for ($i=1; $i<=1; $i++) {
            foreach ($range2 as $letter) {
              //print("A$letter$i\n");
              $spreadsheet->getActiveSheet()->getColumnDimension('A'.$letter)->setWidth(3);
            }
        }
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        $drawing2->setWorksheet($spreadsheet->getActiveSheet());
        $students_male = Student_subject::leftJoin('students', 'students.id', '=', 'student_subjects.student_id')->orderBy('students.last_name')->where('gender', 'MALE')->where('schedule_id', $schedule_id)->get();

        $students_female = Student_subject::leftJoin('students', 'students.id', '=', 'student_subjects.student_id')->orderBy('students.last_name')->where('gender', 'FEMALE')->where('schedule_id', $schedule_id)->get();
        $students = $students_male->merge($students_female);
        $i = 12;
        $count_row = 1;
        foreach($students as $student){
            $name = $student->last_name.' ,'.$student->first_name;
        
            $days_list = $this->getWeekdays($date_month, $date_year);
            $student_info = array();
            array_push($student_info, $name);
            //$student_info['name'] = $name;
            $present_val = 0;
            $late = 0;
            $absent = 0;
            foreach($days_list as $day){
                
                $day_info = $day['date_day'].'_'.$day['day_date_num'];
                $present = Subject_attendance::where('schedule_id', $schedule_id)
                ->where('log_year', $date_year)
                ->where('log_month', $date_month)
                ->where('log_day',  number_format($day['day_date_num'],0))
                ->where('student_id', $student->student_id)
                ->first();
                if(!empty($present)){
                    $present_value = '1';
                    $present_val += 1;
                    if($present->status == 'late'){
                        $late += 1;
                        $present_value = 'late';
                    }
                }
                else {
                    $present_value = '0';
                    $absent += 1;  
                }
                array_push($student_info, $present_value);
                //$student_info[$day_info] = $present_value;
            }
            // $student_info['present'] = $present_val;
            // $student_info['absent'] = $absent;
            // $student_info['late'] = $late;
            array_push($student_info, $present_val);
            array_push($student_info, $absent);
            array_push($student_info, $late);
            $range3 = range("F", "Z");
            
            $spreadsheet->getActiveSheet()->setCellValue('B'.$i, $count_row);
            $spreadsheet->getActiveSheet()->mergeCells('C'.$i.':E'.$i);
            
            $spreadsheet->getActiveSheet()->setCellValue('C'.$i, $student_info[0]);
            $count = 1; 
            foreach ($range3 as $letter) {
                
                $spreadsheet->getActiveSheet()->setCellValue($letter.''.$i, $student_info[$count]);
                $count++;
            }
            $range4= range("A", "C");
            foreach ($range4 as $letter) {
                $spreadsheet->getActiveSheet()->setCellValue('A'.$letter.''.$i, $student_info[$count]);
                $count++;
            }
            $i++;
            $count_row++;
        }
        $writer = new Xlsx($spreadsheet);
        $schedule = Teacher_schedule::with('subject','days')->where('id', $schedule_id)->first(); 
        $writer->save('attendance/'.$schedule->subject->name.'-attendance-'.$date_month.'-'.$date_year.'.xlsx');
        $file_name = $schedule->subject->name.'-attendance-'.$date_month.'-'.$date_year.'.xlsx';
        $attendance_list = new Attendance_list();
        $attendance_list->teacher_id = $schedule->teacher_id;
        $attendance_list->schedule_id = $schedule->id;
        $attendance_list->subject_id = $schedule->subject_id;
        $attendance_list->file_name = $file_name;
        $attendance_list->month = $date_month;
        $attendance_list->school_year = $date_year;
        $attendance_list->semester = $schedule->semester;
        $attendance_list->save();

        return redirect('/panel/teacher/attendance')->with('success', 'Successfully saved...');
    }
}
