<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Section;
use App\Models\Strand;
use Response;
use Validator;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Role_user;
use App\Models\Students_schoolyear;
use App\Models\School_year;


class StudentController extends Controller
{
    //
    public function student_add(Request $req){
            //dd($strand);
        $validator = Validator::make($req->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'contact_number' => 'required',
            'gender' => 'required',
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
            
            $student_info = new Student();
            $student_info->id_number = $req->id_number;
            $student_info->first_name = strtoupper($req->first_name);
            $student_info->last_name =strtoupper($req->last_name);
            $student_info->middle_name =strtoupper($req->middle_name);
            $student_info->contact_number = $req->contact_number;
            $student_info->address = $req->address;
            $student_info->gender =$req->gender;
            $student_info->course = $req->course;
            $student_info->status ='active';
            $student_info->user_id = 0;
            $student_info->save();

            $student_role = Role::where('name', 'student')->first();
            $student = User::create([
                'name' => strtoupper($req->first_name).' '.strtoupper($req->last_name),
                'username' => $req->id_number,
                'email' => $req->id_number.'@ansh-soa.com',
                'password' => Hash::make('password'),
                'status' => 'active',
                'usertype' => 'student'
            ]);
            $insert_role_student = Role_user::create([
                'role_id' => $student_role->id,
                'user_id' => $student->id
            ]);

            $data = Student::find($student_info->id);
            $data->user_id = $student->id;
            
            $data->save();
            
            $student->roles()->attach($student_role);
            //dd($student);
            return response()->json($student_info);
        }
    }
    public function students_search_section(Request $request){
        if($request->ajax())
        {   
            //dd($request->province);
            $search = $request->search;
            
            $output="";
            $sections = Section::where('grade_year', '=',$search)
                ->get();
                //dd($municipalities);
            if($sections)
            {
                foreach ($sections as $section) {
                    $output.='<option value="'.$section->id.'">'.$section->section.'</option>';
                }
                return response($output);
            }
        }
    }
    public function filter_students(Request $req){
        $page_name = 'Students';
        $year = $req->year;
        $semester= $req->semester;
        $students = Students_schoolyear::with('student','section_info')->where('schoolyear', $req->year)->where('semester', $req->semester)->latest()->get();
        //dd($students);
        $school_years =School_year::get();
        $sections = Section::where('grade_year', 'Grade-11')->where('status', 'active')->get();
        $strands = Strand::where('status', 'active')->get();
        return view('panel.admin.students-filter',compact('page_name', 'students', 'strands', 'sections', 'school_years', 'year', 'semester'));
    }
}
