<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PlansController extends Controller
{
    //
    public function plans_add(Request $req){
        $validator = Validator::make($req->all(), [
            'plan_name' => 'required',
            'plan_description' => 'required',
            'plan_price' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $data = new Plan();
            $data->plan_name = $req->plan_name;
            $data->description = $req->plan_description;
            $data->price = $req->plan_price;
            $data->status = 'active';
            $data->save();
            return response()->json($data);
        }
    }

    public function plans_update(Request $req){
        $validator = Validator::make($req->all(), [
            'plan_name' => 'required',
            'plan_description' => 'required',
            'plan_price' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $plan = Plan::find($req->plan_id);
            $data = Plan::find($req->plan_id);
            $data->plan_name = $req->plan_name;
            $data->description = $req->plan_description;
            $data->price = $req->plan_price;
            $data->save();
            if (Auth::check())
            {
                $name = Auth::user()->name;
            }
            Log::info($name.' updated Plan details of '.$plan->plan_name);
            return response()->json($data);
        }
    }

    public function plans_modify(Request $req){
        $data = Plan::find($req->plan_id);
        $data->status = $req->plan_status;
        $data->save();
        if (Auth::check())
        {
            $name = Auth::user()->name;
        }
        Log::info($name.' modified '.$data->plan_name.' into '.$req->plan_status);
        return response()->json($data);
    }
}
