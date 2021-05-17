<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Response;
use Validator;

class SectionController extends Controller
{
    //
    public function section_add(Request $req){
        $validator = Validator::make($req->all(), [
            'section' => 'required',
            'track' => 'required',
            'grade_year' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $data = new Section();
            $data->section = $req->section;
            $data->track = $req->track;
            $data->grade_year = $req->grade_year;
            $data->status = 'active';
            $data->save();
            return response()->json($data);
        }
    }

    public function section_modify(Request $req){
        $data = Section::find($req->section_id);
        $data->status = $req->section_status;
        $data->save();
        return response()->json($data);
    }

    public function section_update(Request $req){
        $validator = Validator::make($req->all(), [
            'section' => 'required', 
            'track' => 'required',
            'grade_year' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            
            $data = Section::find($req->strand_id);
            $data->section = $req->section;
            $data->track = $req->track;
            $data->grade_year = $req->grade_year;
            $data->save();
            return response()->json($data);
        }
    }
}
