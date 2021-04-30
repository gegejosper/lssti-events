<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Plan;
use Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PackagesController extends Controller
{
    //
    public function packages_add(Request $req){
        $validator = Validator::make($req->all(), [
            'package_name' => 'required',
            'package_description' => 'required',
            'package_plan_id' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $plan = Plan::find($req->package_plan_id);
            $data = new Package();
            $data->package_name = $req->package_name;
            $data->description = $req->package_description;
            $data->plan_id = $req->package_plan_id;
            $data->status = 'active';
            $data->save();
            $data->plan_name = $plan->plan_name;
            return response()->json($data);
        }
    }

    public function packages_update(Request $req){
        //dd($req);
        $validator = Validator::make($req->all(), [
            'package_name' => 'required',
            'package_description' => 'required',
            'package_plan_id' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $plan = Plan::find($req->package_plan_id);
            $package = Package::find($req->package_id);
            $data = Package::find($req->package_id);
            $data->package_name = $req->package_name;
            $data->description = $req->package_description;
            $data->plan_id = $req->package_plan_id;
            $data->save();
            $data->plan_name = $plan->plan_name;
            //dd($data);
            if (Auth::check())
            {
                $name = Auth::user()->name;
            }
            Log::info($name.' updated Package details of '.$package->package_name);
            return response()->json($data);
        }
    }

    public function packages_modify(Request $req){
        $data = Package::find($req->package_id);
        $data->status = $req->package_status;
        $data->save();
        if (Auth::check())
        {
            $name = Auth::user()->name;
        }
        Log::info($name.' modified '.$data->package_name.' into '.$req->package_status);
        return response()->json($data);
    }
}
