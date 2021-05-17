<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Strand;
use Response;
use Validator;

class StrandController extends Controller
{
    //
    public function strand_add(Request $req){
        $validator = Validator::make($req->all(), [
            'strand' => 'required',
            'track' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $data = new Strand();
            $data->name = $req->strand;
            $data->track = $req->track;
            $data->status = 'active';
            $data->save();
            return response()->json($data);
        }
    }

    public function strand_modify(Request $req){
        $data = Strand::find($req->strand_id);
        $data->status = $req->strand_status;
        $data->save();
        return response()->json($data);
    }

    public function strand_update(Request $req){
        $validator = Validator::make($req->all(), [
            'strand' => 'required', 
            'track' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            
            $data = Strand::find($req->strand_id);
            $data->name = $req->strand;
            $data->track = $req->track;
            $data->save();
            return response()->json($data);
        }
    }
}
