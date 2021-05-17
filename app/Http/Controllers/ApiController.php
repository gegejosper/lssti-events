<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gate_attendance;
use App\Models\Setting;
use App\Models\Student;

class ApiController extends Controller
{
    //
    public function save_student_attendance(Request $req){
        $log_time = $pieces = explode(" ", $req->log_time);
        $date_log = $log_time[0];
        $time_log = $log_time[1];
        $id_number = $req->id_number;
        $setting = Setting::first();
        $log_count = $req->log_type;
        
        switch ($log_count) {
            case 0:
              $log_type="am-login";
              $log_mesage="login";
              if(date('H:i:s', strtotime($setting->am_log_in_time)) > date('H:i:s', strtotime($time_log))){
                $status = 'on time';
              }
              else {
                $status = 'late';
              }
              
              break;
            case 1:
                $log_type="am-logout";
                $log_mesage="logout";
                if(date('H:i:s', strtotime($setting->am_log_out_time)) > date('H:i:s', strtotime($time_log))){
                    $status = 'early out';
                  }
                else {
                    $status = 'on time';
                }
              break;
            case 2:
                $log_type="pm-login";
                $log_mesage="login";
                $pm_login = $time_log.' PM';
                $time_in_24_hour_format  = date("H:i:s", strtotime($pm_login));
                if(date('H:i:s', strtotime($setting->pm_log_in_time)) > $time_in_24_hour_format){
                    $status = 'on time';
                }
                else {
                    $status = 'late';
                }
              break;
            case 3:
                $log_type="pm-logout";
                $log_mesage="logout";
                $pm_logout = $time_log.' PM';
                $time_in_24_hour_format  = date("H:i:s", strtotime($pm_logout));
                if(date('H:i:s', strtotime($setting->pm_log_out_time)) > $time_in_24_hour_format){
                    $status = 'early out';
                }
                else {
                    $status = 'on time';
                }
              break;
            default:
                $log_type="unidentified";
                $log_mesage="unidentified";
                $status="unidentified";
        }
        
        $count_log = Gate_attendance::where('date_log', $date_log)
            ->where('student_id', $id_number)
            ->where('log_count', $log_count)
            ->count();
        if($count_log == 0){
            $attendance = new Gate_attendance();
            $attendance->student_id = $req->id_number;
            $attendance->date_log = $date_log;
            $attendance->time_log = $time_log;
            $attendance->log_type = $log_type;
            $attendance->log_count = $count_log;
            $attendance->status = $status;
            $attendance->save();

            if($setting->sms == 'yes'){
                $student = Student::where('id_number', $req->id_number)->first();
                $ch = curl_init();
                $parameters = array(
                    'apikey' => '9300a37518f74a9d8be83c721c0719a6', //Your API KEY
                    'number' => $student->contact_number,
                    'message' => 'Good Day, This is to inform you that student '.$student->first_name.' '. $student->last_name.' already '.$log_mesage.' at '.$time_log.' '.$date_log.' in the school. Thank you.',
                    'sendername' => 'AZWAYPH'
                );
                curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
                curl_setopt( $ch, CURLOPT_POST, 1 );
    
                //Send the parameters set above with the request
                curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
    
                // Receive response from server
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                $output = curl_exec( $ch );
                curl_close ($ch);
    
                //Show the server response
                //echo $output;
            }
            return response()->json([
                "message" => "student record created"
            ], 201);
        }
        else {
            return response()->json([
                "message" => "student already logged"
            ], 201);
        }
        
    }

    public function show_log_students(){
        $attendance = Gate_attendance::all();
        return $attendance;
    }
}
