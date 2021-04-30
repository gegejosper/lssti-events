<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Setting;
class SettingController extends Controller
{
    //
    public function save_settings(Request $req){
        $update_setting = Setting::where('id', '=', 1)
            ->update(['send_bill_day' => $req->send_bill_day, 'send_bill_due_day' => $req->send_bill_due_day, 'notice_day' => $req->notice_day, 'penalty' => $req->penalty]);
            return redirect()->back()->with('success','Settings successfully updated!');
    }
}
