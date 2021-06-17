<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/apply', 'FrontController@apply');
Route::get('/generate_token', function(){
    $api_token = Str::random(60);
    return $api_token;
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::namespace('Panel')->prefix('panel')->name('panel.')->group(function() {
    Route::middleware('can:manage-admin')->prefix('admin')->name('admin.')->group(function() {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');
        Route::get('/messaging', 'AdminController@messaging')->name('messaging');
        Route::post('/sms/send', 'AdminController@send_sms')->name('send_sms');
        Route::get('/school_year', 'AdminController@school_year')->name('school_year');
        Route::get('/setup', 'AdminController@setup')->name('setup');
        Route::get('/logs', 'AdminController@logs')->name('logs');
        Route::post('/setup/save', 'AdminController@save_setup')->name('save_setup');
        Route::post('/setup/save_attendance_setup', 'AdminController@save_attendance_setup')->name('save_attendance_setup');
        Route::post('/school_year/add', 'SchoolYearController@school_year_add')->name('school_year_add');
        Route::post('/school_year/modify', 'SchoolYearController@school_year_modify')->name('school_year_modify');
        Route::post('/school_year/update', 'SchoolYearController@school_year_update')->name('school_year_update');

        Route::get('/strand', 'AdminController@strand')->name('strand');
        Route::post('/strand/add', 'StrandController@strand_add')->name('strand_add');
        Route::post('/strand/modify', 'StrandController@strand_modify')->name('strand_modify');
        Route::post('/strand/update', 'StrandController@strand_update')->name('strand_update');

        Route::get('/subjects', 'AdminController@subjects')->name('subjects');
        Route::post('/subject/add', 'SubjectController@subject_add')->name('subject_add');
        Route::post('/subject/modify', 'SubjectController@subject_modify')->name('subject_modify');
        Route::post('/subject/update', 'SubjectController@subject_update')->name('subject_update');

        Route::get('/sections', 'AdminController@sections')->name('sections');
        Route::post('/section/add', 'SectionController@section_add')->name('section_add');
        Route::post('/section/modify', 'SectionController@section_modify')->name('section_modify');
        Route::post('/section/update', 'SectionController@section_update')->name('section_update');

        Route::get('/teachers', 'AdminController@teachers')->name('teachers');
        Route::post('/teacher/add', 'TeacherController@teacher_add')->name('teacher_add');
        Route::post('/teacher/modify', 'TeacherController@teacher_modify')->name('teacher_modify');
        Route::post('/teacher/update', 'TeacherController@teacher_update')->name('teacher_update');

        Route::get('/students', 'AdminController@students')->name('students');
        Route::get('/students/search_section', 'StudentController@students_search_section')->name('students_search_section');
        Route::post('/student/add', 'StudentController@student_add')->name('student_add');
        Route::post('/student/modify', 'StudentController@student_modify')->name('student_modify');
        Route::post('/student/update', 'StudentController@student_update')->name('student_update');
        Route::post('/student/filter', 'StudentController@filter_students')->name('filter_students');
        
        Route::get('/users', 'AdminController@users')->name('subscribers');
        Route::get('/users/{user_id}', 'UserController@edit_user')->name('edit_user');  
        Route::post('/users/update', 'UserController@update_user')->name('update_user');  
        Route::post('/users/modify', 'UserController@modify_user')->name('modify_user');  
        Route::post('/users/add', 'UserController@add_user')->name('add_user');  

        Route::get('/gate_attendance', 'AdminController@gate_attendance')->name('gate_attendance');
        Route::post('/gate_attendance', 'AdminController@gate_attendance')->name('history_gate_attendance');
    });
});
Route::namespace('Panel')->prefix('panel')->name('panel.')->group(function() {
    Route::middleware('can:manage-student')->prefix('student')->name('student.')->group(function() {
        Route::get('/', 'StudentPanelController@dashboard')->name('dashboard');
        Route::get('/schedules', 'StudentPanelController@schedules')->name('schedules');
        Route::post('/enroll', 'StudentPanelController@process_enroll')->name('process_enroll');
        Route::get('/attendance', 'StudentPanelController@attendance')->name('attendance');
        Route::get('/attendance/view/{schedule_id}', 'StudentPanelController@view_attendance')->name('attendance');
        Route::post('/check/present', 'StudentPanelController@check_present')->name('check_present');
    });
});
Route::namespace('Panel')->prefix('panel')->name('panel.')->group(function() {
    Route::middleware('can:manage-teacher')->prefix('teacher')->name('teacher.')->group(function() {
        Route::get('/', 'TeacherPanelController@dashboard')->name('dashboard');
        Route::get('/schedules', 'TeacherPanelController@schedules')->name('schedules');
        Route::post('/schedule/add', 'TeacherScheduleController@add_schedule')->name('add_schedule');
        Route::post('/schedule/modify', 'TeacherScheduleController@modify_schedule')->name('modify_schedule');
        Route::get('/schedule/view/{schedule_id}', 'TeacherScheduleController@view_schedule')->name('view_schedule');
        Route::get('/requests', 'TeacherPanelController@requests')->name('requests');
        Route::post('/enroll/approve', 'TeacherPanelController@approve_enroll')->name('approve_enroll');
        Route::post('/enroll/decline', 'TeacherPanelController@decline_enroll')->name('decline_enroll');
        Route::post('/present/student', 'TeacherPanelController@present_student')->name('present_student');
        Route::post('/late/student', 'TeacherPanelController@late_student')->name('late_student');
        Route::post('/check/present', 'TeacherPanelController@check_present')->name('check_present');
        Route::get('/attendance', 'TeacherPanelController@attendance')->name('attendance');
        Route::post('/attendance/show', 'TeacherPanelController@show_attendance')->name('show_attendance');
        Route::get('/reports', 'TeacherPanelController@reports')->name('reports');
        //Route::get('/export/attendance/', 'TeacherPanelController@export_attendance')->name('export_attendance');
        Route::get('/export/attendance/{date_month}/{date_year}/{schedule_id}', 'TeacherPanelController@export_attendance')->name('export_attendance');
        Route::get('/save_data/{date_month}/{date_year}/{schedule_id}', 'TeacherPanelController@save_data')->name('save_data');
        Route::get('/show_date', function(){
            function getWeekdays($m, $y = NULL){
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
            $days_list = getWeekdays(5, 2021);
            //$student = new Student();
            $student['name'] = 'Gege';
            foreach($days_list as $day){
                $day_info = $day['date_day'].'_'.$day['day_date_num'];
                $student[$day_info] = '0';
                //array_push($days, $day_info);
            }
            dd($student);
        });
    });
});

// class StudentList_info{
//     private $field = array();
//     public function __get($name)
//    {
//       if(isset($this->field[$name]))
//         return $this->field[$name];
//       else
//         throw new Exception("$name dow not exists");
//    }
// }
require __DIR__.'/auth.php';
