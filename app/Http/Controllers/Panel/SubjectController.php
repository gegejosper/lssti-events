<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use Response;
use Validator;

class SubjectController extends Controller
{
    //
    public function subject_add(Request $req){
        $validator = Validator::make($req->all(), [
            'subject' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $data = new Subject();
            $data->name = $req->subject;
            $data->status = 'active';
            $data->save();
            return response()->json($data);
        }
    }

    public function subject_modify(Request $req){
        $data = Subject::find($req->subject_id);
        $data->status = $req->subject_status;
        $data->save();
        return response()->json($data);
    }

    public function subject_update(Request $req){
        $validator = Validator::make($req->all(), [
            'subject' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            
            $data = Subject::find($req->subject_id);
            $data->name = $req->subject;
            $data->save();
            return response()->json($data);
        }
    }
}
