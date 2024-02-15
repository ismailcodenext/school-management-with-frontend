<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    function AdmissionList(){
        try {
            $user_id=Auth::id();
            $admissionData= StudentInfo::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'admissionData' => $admissionData]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function AdmissionCreate(){

    }
}
