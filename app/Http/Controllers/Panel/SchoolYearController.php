<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School_year;
use App\Models\Setting;
use Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SchoolYearController extends Controller
{
    //
    public function school_year_add(Request $req){
        $validator = Validator::make($req->all(), [
            'school_year' => 'required',
            'semester' => 'required',
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $data_setting = Setting::first();
            $data_setting->school_year = $req->school_year;
            $data_setting->semester = $req->semester;
            $data_setting->save();

            $update_school_year = School_year::where('status', 'active')->update(['status' => 'inactive']);

            $data = new School_year();
            $data->cy = $req->school_year;
            $data->semester = $req->semester;
            $data->status = 'active';
            $data->save();
            return response()->json($data);
        }
    }

    public function school_year_modify(Request $req){
        $update_school_year = School_year::where('status', 'active')->update(['status' => 'inactive']);
        $data = School_year::find($req->school_year_id);
        $data->status = $req->school_year_status;
        $data->save();

        $data_setting = Setting::first();
        $data_setting->school_year = $data->cy;
        $data_setting->semester = $data->semester;
        $data_setting->save();

        
        return response()->json($data);
    }

    public function school_year_update(Request $req){
        $validator = Validator::make($req->all(), [
            'school_year' => 'required',
            'semester' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            
            $data = School_year::find($req->school_year_id);
            $data->cy = $req->school_year;
            $data->semester = $req->semester;
            $data->save();
            return response()->json($data);
        }
    }
}
