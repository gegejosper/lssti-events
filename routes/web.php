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

Route::get('/', 'FrontController@index');
Route::get('/apply', 'FrontController@apply');
Route::get('/generate_token', function(){
    $api_token = Str::random(60);
    return $api_token;
});
Route::get('/update/log/{logtype}', 'FrontController@update_log_type');
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
        Route::get('/reports', 'AdminController@reports')->name('logs');
        Route::post('/setup/save', 'AdminController@save_setup')->name('save_setup');
        Route::post('/setup/save_attendance_setup', 'AdminController@save_attendance_setup')->name('save_attendance_setup');
        Route::post('/school_year/add', 'SchoolYearController@school_year_add')->name('school_year_add');
        Route::post('/school_year/modify', 'SchoolYearController@school_year_modify')->name('school_year_modify');
        Route::post('/school_year/update', 'SchoolYearController@school_year_update')->name('school_year_update');

        Route::get('/courses', 'AdminController@courses')->name('courses');
        Route::post('/course/add', 'CourseController@course_add')->name('course_add');
        Route::post('/course/modify', 'CourseController@course_modify')->name('course_modify');
        Route::post('/course/update', 'CourseController@course_update')->name('course_update');

        Route::get('/events', 'AdminController@events')->name('events');
        Route::get('/events/{event_id}', 'EventController@view_event')->name('view_event');
        Route::post('/event/add', 'EventController@event_add')->name('event_add');
        Route::post('/event/modify', 'EventController@event_modify')->name('event_modify');
        Route::post('/event/update', 'EventController@event_update')->name('event_update');

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
        Route::get('/attendance/view/{schedule_id}', 'StudentPanelController@view_attendance')->name('view_attendance');
        Route::post('/check/present', 'StudentPanelController@check_present')->name('check_present');
    });
});


require __DIR__.'/auth.php';
