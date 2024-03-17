<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\StudentInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;

class StudentInfoController extends Controller
{

    function StudentInfoList()
    {
        try {
            $user_id = Auth::id();
            $StudentData = StudentInfo::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'StudentData' => $StudentData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function StudentInfoCreate(Request $request)
    {

        try {
            $user_id = Auth::id();
            $student_img = $request->file('img_student');
            $st = time();
            $file_name = $student_img->getClientOriginalName();
            $student_img_name = "{$user_id}-{$st}-{$file_name}";
            $student_img_url = "uploads/Student_img/{$student_img_name}";
            // Upload File
            $student_img->move(public_path('uploads/Student_img/'), $student_img_name);

            StudentInfo::create([
                'img_url' => $student_img_url,
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'dob' => $request->input('dob'),
                'gender' => $request->input('gender'),
                'blood_group' => $request->input('blood_group'),
                'admission_date' => $request->input('admission_date'),
                'religion' => $request->input('religion'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email'),
                'mother_tongue' => $request->input('mother_tongue'),
                'bc_no' => $request->input('bc_no'),
                'nid_no' => $request->input('nid_no'),
                'present_address' => $request->input('present_address'),
                'permanent_address' => $request->input('permanent_address'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'category' => $request->input('category'),
                'status' => $request->input('status'),
                'user_id' => $user_id

            ]);

            return response()->json(['status' => 'success', 'message' => "Student Information Add Successful"]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }

    function StudentInfoByID(Request $request)
    {
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);

            $studentInfo = StudentInfo::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            $gradiantInfo = GradiantInfos::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            $academicInfo = AcademicDetails::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            $previousInfo = PreviousInstitute::where('id', $request->input('id'))->where('user_id', $user_id)->first();

            return response()->json(['status' => 'success', 'studentInfo' => $studentInfo, 'gradiantInfo' => $gradiantInfo, 'academicInfo' => $academicInfo, 'previousInfo' => $previousInfo]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function StudentInfoUpdate(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate([
                'id' => 'required|string',
            ]);

            // Find records in each table based on the given ID
            $student_info = StudentInfo::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            $gradiant_info = GradiantInfos::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            $academic_details = AcademicDetails::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            $previous_institute = PreviousInstitute::where('id', $request->input('id'))->where('user_id', $user_id)->first();

            if (!$student_info && !$gradiant_info && !$academic_details && !$previous_institute) {
                return response()->json(['status' => 'fail', 'message' => 'Record not found or unauthorized access.']);
            }
            if ($student_info && $student_info->img_url && File::exists(public_path($student_info->img_url))) {
                File::delete(public_path($student_info->img_url));
            }
            if ($gradiant_info && $gradiant_info->img_url && File::exists(public_path($gradiant_info->img_url))) {
                File::delete(public_path($gradiant_info->img_url));
            }

            if ($student_info) {
                $student_info->delete();
            }
            if ($gradiant_info) {
                $gradiant_info->delete();
            }
            if ($academic_details) {
                $academic_details->delete();
            }
            if ($previous_institute) {
                $previous_institute->delete();
            }

            return response()->json(['status' => 'success', 'message' => 'Records deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



}
