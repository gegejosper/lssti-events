<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Gate_attendance;
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
        $event = Event::find($event_id);
        $gate_logged = Gate_attendance::with('student', 'event_detail')->where('event', $event_id)->latest()->get();
        return view('panel.admin.reports.event',compact('page_name', 'gate_logged', 'event'));
        
    }
}
