<?php

namespace App\Http\Controllers;

use App\Models\GradiantInfos;
use App\Models\StudentInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AcademicDetails;
use App\Models\PreviousInstitute;

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


            $gradiant_img = $request->file('img_gradient');
            $gt = time();
            $file_name = $student_img->getClientOriginalName();
            $gradiant_img_name = "{$user_id}-{$gt}-{$file_name}";
            $gradiant_img_url = "uploads/Gradiant_img/{$gradiant_img_name}";
            // Upload File
            $gradiant_img->move(public_path('uploads/Gradiant_img/'), $gradiant_img_name);

            GradiantInfos::create([
                'img_url' => $gradiant_img_url,
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
                'user_id' => $user_id
            ]);


            AcademicDetails::create([
                'institute_name' => $request->input('institute_name'),
                'admisstion_date' => $request->input('admisstion_date'),
                'roll_no' => $request->input('roll_no'),
                'user_id' => $user_id

            ]);

            PreviousInstitute::create([
                'institute_names' => $request->input('institute_names'),
                'class_name' => $request->input('class_name'),
                'years' => $request->input('years'),
                'user_id' => $user_id

            ]);

            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }


    }
}
