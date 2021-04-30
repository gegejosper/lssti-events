<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EmployeesController extends Controller
{
    //
    public function employees_add(Request $req){
        $validator = Validator::make($req->all(), [
            'employee_fname' => 'required',
            'employee_lname' => 'required',
            'employee_position' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $data = new Employee();
            $data->fname = $req->employee_fname;
            $data->lname = $req->employee_lname;
            $data->position = $req->employee_position;
            $data->status = 'active';
            $data->save();
            return response()->json($data);
        }
    }

    public function employees_update(Request $req){
        //dd($req);
        $validator = Validator::make($req->all(), [
            'employee_fname' => 'required',
            'employee_lname' => 'required',
            'employee_position' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $employee = Employee::find($req->employee_id);
            $data = Employee::find($req->employee_id);
            $data->fname = $req->employee_fname;
            $data->lname = $req->employee_lname;
            $data->position = $req->employee_position;
            $data->save();
            if (Auth::check())
            {
                $name = Auth::user()->name;
            }
            Log::info($name.' updated Employee details of '.$employee->fname.' '.$employee->lname);
            return response()->json($data);
        }
    }

    public function employees_modify(Request $req){
        $data = Employee::find($req->employee_id);
        $data->status = $req->employee_status;
        $data->save();
        if (Auth::check())
        {
            $name = Auth::user()->name;
        }
        Log::info($name.' modified '.$data->employee_fname.' '.$data->employee_lname.' into '.$req->employee_status);
        return response()->json($data);
    }
}
