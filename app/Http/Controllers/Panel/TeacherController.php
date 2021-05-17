<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Response;
use Validator;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Role_user;


class TeacherController extends Controller
{
    //
    public function teacher_add(Request $req){
        $validator = Validator::make($req->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required'

        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $data = new Teacher();
            $data->first_name = strtoupper($req->first_name);
            $data->last_name = strtoupper($req->last_name);
            $data->contact_number = $req->contact_number;
            $data->address = $req->address;
            $data->status = 'active';
            $data->user_id = 0;
            $data->save();
            
            $username = strtoupper($req->first_name).''.strtoupper($req->last_name);
            
            $teacher_role = Role::where('name', 'teacher')->first();
            $teacher = User::create([
                'name' => strtoupper($req->first_name).' '.strtoupper($req->last_name),
                'username' => $username,
                'email' => $username.'@ansh-soa.com',
                'password' => Hash::make('password'),
                'status' => 'active',
                'usertype' => 'teacher'
             ]);
            
            $insert_role_teacher = Role_user::create([
                'role_id' => $teacher_role->id,
                'user_id' => $teacher->id
            ]);
            //$teacher->roles()->attach($teacher_role);

            $data = Teacher::find($data->id);
            $data->user_id = $teacher->id;
            $data->save();
            
            return response()->json($data);
        }
    }

    public function teacher_modify(Request $req){
        $data = Teacher::find($req->teacher_id);
        $data->status = $req->teacher_status;
        $data->save();
        return response()->json($data);
    }

    public function teacher_update(Request $req){
        $validator = Validator::make($req->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'contact_number' => 'required',
            'address' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            
            $data = Teacher::find($req->teacher_id);
            $data->first_name = $req->fname;
            $data->last_name = $req->lname;
            $data->contact_number = $req->contact_number;
            $data->address = $req->address;
            $data->save();
            return response()->json($data);
        }
    }
}
