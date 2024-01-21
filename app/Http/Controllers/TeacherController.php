<?php

namespace App\Http\Controllers;


use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    function CreateTeacher(Request $request){
        try {
            $user_id=Auth::id();
            $img=$request->file('img');

            $t=time();
            $file_name=$img->getClientOriginalName();
            $img_name="{$user_id}-{$t}-{$file_name}";
            $img_url="uploads/teacher_img/{$img_name}";


            // Upload File
            $img->move(public_path('uploads/teacher_img'),$img_name);

//            $request->validate([
//                'name' => 'required|string|max:50',
//                'email' => 'required|string|email|max:50|unique:users,email',
//                'mobile' => 'required|string|max:50',
//                'designation' => 'required|string|max:100',
//                'education' => 'required|string|max:100',
//                'address' => 'required|string|max:200',
//                'img_url'=>$img_url,
//            ]);
            Teacher::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'mobile'=>$request->input('mobile'),
                'designation'=>$request->input('designation'),
                'education'=>$request->input('education'),
                'address'=>$request->input('address'),
                'user_id'=>$user_id,
                'img_url'=>$img_url

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function TeacherList(Request $request)
    {
        try {
            $user_id=Auth::id();
            $teacherData= Teacher::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'teacherData' => $teacherData]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

//    function DeleteTeacher(Request $request)
//    {
//        try {
//            $user_id=Auth::id();
//            $request->validate([
//                "id"=> 'required|string',
//            ]);
//            Teacher::where('id',$request->input('id'))->where('user_id',$user_id)->delete();
//            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
//        }catch (Exception $e){
//            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
//        }
//    }

    function DeleteTeacher(Request $request)
    {
        try {
            $user_id = Auth::id();
            $request->validate([
                'id' => 'required|string',
            ]);

            $teacher = Teacher::where('id', $request->input('id'))->where('user_id', $user_id)->first();

            if (!$teacher) {
                return response()->json(['status' => 'fail', 'message' => 'Teacher not found or unauthorized access.']);
            }

            // Delete the image file from the uploads directory
            if ($teacher->img_url && File::exists(public_path($teacher->img_url))) {
                File::delete(public_path($teacher->img_url));
            }

            // Delete the teacher record from the database
            $teacher->delete();

            return response()->json(['status' => 'success', 'message' => 'Teacher deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function TeacherByID(Request $request)
    {
        try {
            $user_id=Auth::id();
            $request->validate(["id"=> 'required|string']);
            $rows= Teacher::where('id',$request->input('id'))->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function UpdateTeacher(Request $request)
    {
        try {
            $user_id = Auth::id();
            $teacher = Teacher::find($request->input('id'));

            if (!$teacher || $teacher->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Teacher not found or unauthorized access.']);
            }

            // Update the teacher's information
            $teacher->name = $request->input('name');
            $teacher->email = $request->input('email');
            $teacher->mobile = $request->input('mobile');
            $teacher->designation = $request->input('designation');
            $teacher->education = $request->input('education');
            $teacher->address = $request->input('address');

            // Handle photo upload if included in the request
            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/teacher_img/{$img_name}";

                // Upload File
                $img->move(public_path('uploads/teacher_img'), $img_name);

                // Delete the previous image if it exists
                if ($teacher->img_url && file_exists(public_path($teacher->img_url))) {
                    unlink(public_path($teacher->img_url));
                }

                // Update the image URL in the database
                $teacher->img_url = $img_url;
            }

            // Save the changes
            $teacher->save();

            return response()->json(['status' => 'success', 'message' => 'Teacher information updated successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }




}
