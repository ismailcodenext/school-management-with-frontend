<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GradientInfo;
use App\Models\Group;
use App\Models\AcademicDetails;
use App\Models\PreviousInstituteDetails;

class AdmissionController extends Controller
{
    function AdmissionList()
    {
        try {
            $user_id = Auth::id();
            $admissionData = StudentInfo::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'admissionData' => $admissionData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function AdmissionCreate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $student_infos_id = GradientInfo::id();
            $group_id = Group::id();

            // Student Information
            $user_id = Auth::id();
            $student_img = $request->file('img');

            $t = time();
            $file_name = $student_img->getClientOriginalName();
            $student_img_name = "{$user_id}-{$t}-{$file_name}";
            $student_img_url = "uploads/Student_img/{$student_img_name}";


            // Upload File
            $student_img->move(public_path('uploads/Student_img'), $student_img_name);

            StudentInfo::create([
                'img_url' => $student_img_url,
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'dob' => $request->input('dob'),
                'gender' => $request->input('gender'),
                'blood_group' => $request->input('blood_group'),
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
                'user_id' => $user_id

            ]);

            $guardian_img = $request->file('img');

            $t = time();
            $file_name = $guardian_img->getClientOriginalName();
            $guardian_img_name = "{$user_id}-{$t}-{$file_name}";
            $student_img_url = "uploads/Gradient_img/{$guardian_img_name}";
            // Upload File
            $guardian_img->move(public_path('uploads/Gradient_img'), $guardian_img_name);

            GradientInfo::create([
                'img_url' => $guardian_img_name,
                'guardian_name' => $request->input('guardian_name'),
                'relation' => $request->input('relation'),
                'father_name' => $request->input('father_name'),
                'mother_name' => $request->input('mother_name'),
                'occupation' => $request->input('occupation'),
                'income' => $request->input('income'),
                'education' => $request->input('education'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'student_infos_id' => $student_infos_id,
                'user_id' => $user_id

            ]);


            AcademicDetails::create([
                'institute_name' => $request->input('institute_name'),
                'admisstion_date' => $request->input('admisstion_date'),
                'roll_no' => $request->input('roll_no'),
                'classroom_id' => $request->input('classroom_id'),
                'section_id' => $request->input('section_id'),
                'group_id' => $group_id,
                'student_infos_id' => $student_infos_id,
                'user_id' => $user_id

            ]);

            PreviousInstituteDetails::create([
                'institute_names' => $request->input('institute_names'),
                'class_name' => $request->input('class_name'),
                'years' => $request->input('years'),
                'student_infos_id' => $student_infos_id,
                'user_id' => $user_id

            ]);

            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }


    }
}
