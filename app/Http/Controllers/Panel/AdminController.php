<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Message;
use App\Models\User;
use App\Models\Role;
use App\Models\School_year;
use App\Models\Strand;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Student_subject;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subject_attendance;
use App\Models\Teacher;
use App\Models\Gate_attendance;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $page_name = 'Dashboard';
        $gate_logged = Gate_attendance::with('student')->latest()->take(10)->get();
        $students = Student::where('status', 'active')->count();
        $male_students = Student::where('gender', 'MALE')->where('status', 'active')->count();
        $female_students = Student::where('gender', 'FEMALE')->where('status', 'active')->count();
        $grade11_students = Student::where('grade_year', 'Grade-11')->where('status', 'active')->count();
        $grade12_students = Student::where('grade_year', 'Grade-12')->where('status', 'active')->count();
        $today = date('Y-m-d');
        $gate_logged_count = Gate_attendance::where('date_log', $today)->with('student')->count();
        $gate_logged_count = Gate_attendance::where('date_log', $today)->with('student')->count();
        return view('panel.admin.dashboard',compact('page_name', 'gate_logged', 'students', 'gate_logged_count', 'male_students', 'female_students', 'grade11_students', 'grade12_students'));
    }

    public function users(){
        $page_name = 'Users';
        $users = User::with('roles')->paginate(10);
        $roles = Role::where('name', '!=', 'member')->get();
        return view('panel.admin.users',compact('page_name', 'users', 'roles'));
    }

    public function messaging(){
        $page_name = 'Messaging';
        return view('panel.admin.messaging',compact('page_name', 'page_name'));
    }
    public function send_sms(Request $req){
        if($req->reciever == 'teacher'){
            $teachers = Teacher::where('status', 'active')->get();
            foreach($teachers as $teacher){
                $ch = curl_init();
                $parameters = array(
                    'apikey' => '9300a37518f74a9d8be83c721c0719a6', //Your API KEY
                    'number' => $teacher->contact_number,
                    'message' => $req->sms_message,
                    'sendername' => 'AZWAYPH'
                );
                curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
                curl_setopt( $ch, CURLOPT_POST, 1 );
    
                //Send the parameters set above with the request
                curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
    
                // Receive response from server
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                $output = curl_exec( $ch );
                curl_close ($ch);
            }
            return redirect()->back()->with('success', 'Message successfully sent...');
        }
        else if($req->reciever == 'student'){
            $students = Student::where('status', 'active')->get();
            foreach($students as $student){
                $ch = curl_init();
                $parameters = array(
                    'apikey' => '9300a37518f74a9d8be83c721c0719a6', //Your API KEY
                    'number' => $student->contact_number,
                    'message' => $req->sms_message,
                    'sendername' => 'AZWAYPH'
                );
                curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
                curl_setopt( $ch, CURLOPT_POST, 1 );
    
                //Send the parameters set above with the request
                curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
    
                // Receive response from server
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                $output = curl_exec( $ch );
                curl_close ($ch);
            }
            return redirect()->back()->with('success', 'Message successfully sent...');
        }
        else {
            return redirect()->back()->with('success', 'Something is wrong, please retry');
        }
        
    }
    public function school_year(){
        $page_name = 'School Year';
        $school_years = School_year::all();
        return view('panel.admin.school_year',compact('page_name', 'school_years'));
    }

    public function strand(){
        $page_name = 'Strand';
        $strands = Strand::all();
        return view('panel.admin.strand',compact('page_name', 'strands'));
    }

    public function subjects(){
        $page_name = 'Subjects';
        $subjects = Subject::all();
        return view('panel.admin.subjects',compact('page_name', 'subjects'));
    }

    public function sections(){
        $page_name = 'Strand';
        $sections = Section::all();
        return view('panel.admin.sections',compact('page_name', 'sections'));
    }

    public function teachers(){
        $page_name = 'Teachers';
        $teachers = Teacher::all();
        return view('panel.admin.teachers',compact('page_name', 'teachers'));
    }

    public function students(){
        $page_name = 'Students';
        $students = Student::latest()->get();
        $sections = Section::where('grade_year', 'Grade-11')->where('status', 'active')->get();
        $strands = Strand::where('status', 'active')->get();
        return view('panel.admin.students',compact('page_name', 'students', 'strands', 'sections'));
    }
    public function setup(){
        $settings = Setting::first();
        $page_name = 'Setup';
        return view('panel.admin.setup',compact('page_name', 'settings'));
    }
    public function save_setup(Request $req){
        //dd($req);
        $data = Setting::find($req->setting_id);
        $data->am_log_in_time = $req->am_log_in_time;
        $data->am_log_out_time = $req->am_log_out_time;
        $data->pm_log_in_time = $req->pm_log_in_time;
        $data->pm_log_out_time= $req->pm_log_out_time;
        $data->subject_late_time = $req->subject_late_time;
        $data->sms = $req->sms;
        $data->system_date = $req->system_date;
        $data->use_system_date = $req->use_system_date;
        $data->save();
        return redirect()->back()->with('success','Setup updated...');
    }
    public function gate_attendance(Request $req){
        
        
        $page_name = 'Attendance';
        if(isset($req->date_log)){
            $today = $req->date_log;
        }
        else {
            $today = date('Y-m-d');
        }
        //$today = '2021-05-01';
        
        //$gate_attendances = Gate_attendance::where('date_log', $today)->paginate(200);
        $students = Student::where('status', 'active')
        ->with(['student_am_login' => function($query) use ($today){
            $query->where('log_type', 'am-login');
            $query->where('date_log', $today);
        }])
        ->with(['student_am_logout' => function($query) use ($today){
            $query->where('log_type', 'am-logout');
            $query->where('date_log', $today);
        }])
        ->with(['student_pm_login' => function($query) use ($today){
            $query->where('log_type', 'pm-login');
            $query->where('date_log', $today);
        }])
        ->with(['student_pm_logout' => function($query) use ($today){
            $query->where('log_type', 'pm-logout');
            $query->where('date_log', $today);
        }])
        ->paginate(200);
        //dd($students);
        return view ('panel.admin.gate-attendance', compact('page_name', 'today', 'students'));
    }
}
