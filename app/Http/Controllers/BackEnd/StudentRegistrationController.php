<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Models\StudentRegistration;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class StudentRegistrationController extends Controller
{

    // public function index(){
    //     $StudentRegistrationData=StudentRegistration::first();
    //     return ResponseHelper::Out('success',$StudentRegistrationData,200);
    // }

    public function StudentRegistrationCreate(Request $request)
    {
        try {
            $user_id = Auth::id();

            StudentRegistration::create([
                'student_id' => $request->input('student_id'),
                'class_name' => $request->input('class_name'),
                'section_name' => $request->input('section_name'),
                'student_roll' => $request->input('student_roll'),
                'sesson' => $request->input('sesson'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => 'Student Registration Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function StudentRegistrationList()
    {
        try {
            $user_id = Auth::id();
            $StudentRegistration_data = StudentRegistration::all();
            return response()->json(['status' => 'success', 'StudentRegistration_data' => $StudentRegistration_data]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function StudentRegistrationByID(Request $request)
    {
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);
            ;

            $rows = StudentRegistration::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function StudentRegistrationUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $StudentRegistration = StudentRegistration::find($request->input('id'));

            if (!$StudentRegistration || $StudentRegistration->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'StudentRegistration not found or unauthorized access.']);
            }

            // Update the StudentRegistration information
            $StudentRegistration->student_id = $request->input('student_id');
            $StudentRegistration->class_name = $request->input('class_name');
            $StudentRegistration->section_name = $request->input('section_name');
            $StudentRegistration->student_roll = $request->input('student_roll');
            $StudentRegistration->sesson = $request->input('sesson');
            $StudentRegistration->save();

            return response()->json(['status' => 'success', 'message' => 'Student Registration Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function StudentRegistrationDelete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $StudentRegistration_id = $request->input('id');
            $StudentRegistration = StudentRegistration::find($StudentRegistration_id);

            if (!$StudentRegistration) {
                return response()->json(['status' => 'fail', 'message' => 'StudentRegistration not found.']);
            }
            StudentRegistration::where('id', $StudentRegistration_id)->delete();

            return response()->json(['status' => 'success', 'message' => 'Student Registration Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


}
