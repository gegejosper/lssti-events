<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Course;
use App\Models\Gate_attendance;
use Carbon\Carbon;
use Response;
use Validator;

class EventController extends Controller
{
    //
    public function event_add(Request $req){
        $validator = Validator::make($req->all(), [
            'event_name' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP date for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $data = new Event();
            $data->event_name = $req->event_name;
            $data->event_date = $req->event_date;
            $data->status = 'active';
            $data->save();
            return response()->json($data);
        }
    }

    public function event_modify(Request $req){
        $data = Event::find($req->event_id);
        $data->status = $req->event_status;
        $data->save();
        return response()->json($data);
    }

    public function event_update(Request $req){
        $validator = Validator::make($req->all(), [
            'event_name' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP date for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            
            $data = Event::find($req->event_id);
            $data->event_name = $req->event_name;
            $data->event_date = $req->event_date;
            $data->save();
            return response()->json($data);
        }
    }
    public function view_event($event_id){
        $page_name = 'Event Report';
        $departments = Course::get();
        //$gate_logged = Gate_attendance::with('student', 'event_detail')->latest()->get();
        $event = Event::find($event_id);
        $gate_logs = Gate_attendance::where('event', $event_id)->with('student', 'event_detail')
        ->whereIn('log_type', ['login', 'logout'])
        ->latest()
        ->get();

        // Organize the data into an associative array
        $log_data = [];

        foreach ($gate_logs as $log) {
            $student_id = $log->student_id;
            $log_type = $log->log_type;
            $carbonTime = Carbon::createFromFormat('H:i:s',  $log->time_log);
            $time_log = $carbonTime->format('h:i A');
            //dd($time_log);

            if (!isset($log_data[$student_id])) {
                $log_data[$student_id] = [
                    'student' => $log->student,
                    'date_log' => $log->date_log,
                    'course' => $log->course,
                    'event' => $log->event_detail,
                    'login_time' => null,
                    'logout_time' => null,
                   
                ];
            }

            if ($log_type === 'login') {
                $log_data[$student_id]['login_time'] = $time_log;
            } elseif ($log_type === 'logout') {
                $log_data[$student_id]['logout_time'] = $time_log;
            }
        }
        //dd($log_data);
        return view('panel.admin.reports.event',compact('page_name', 'log_data', 'event', 'departments'));
        
    }
    public function view_event_by_deparment($event_id, $department){
        $page_name = 'Event Report';
        $departments = Course::get();
        //$gate_logged = Gate_attendance::with('student', 'event_detail')->latest()->get();
        $event = Event::find($event_id);
        $gate_logs = Gate_attendance::where('course', $department)->where('event', $event_id)->with('student', 'event_detail')
        ->whereIn('log_type', ['login', 'logout'])
        ->latest()
        ->get();

        // Organize the data into an associative array
        $log_data = [];
       
        foreach ($gate_logs as $log) {
            $student_id = $log->student_id;
            $log_type = $log->log_type;
            $carbonTime = Carbon::createFromFormat('H:i:s',  $log->time_log);
            $time_log = $carbonTime->format('h:i A');
            if (!isset($log_data[$student_id])) {
                $log_data[$student_id] = [
                    'student' => $log->student,
                    'date_log' => $log->date_log,
                    'course' => $log->course,
                    'event' => $log->event_detail,
                    'login_time' => null,
                    'logout_time' => null,
                   
                ];
            }

            if ($log_type === 'login') {
                $log_data[$student_id]['login_time'] = $time_log;
            } elseif ($log_type === 'logout') {
                $log_data[$student_id]['logout_time'] = $time_log;
            }
        }
        //dd($log_data);
        return view('panel.admin.reports.event',compact('page_name', 'log_data', 'event', 'departments'));
        
    }
}
