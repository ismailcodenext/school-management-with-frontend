<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\GradianInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;

class GradianInfoController extends Controller
{
    function GradianInfoList()
    {
        try {
            $user_id = Auth::id();
            $GradianData = GradianInfo::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'GradianData' => $GradianData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function GradianInfoCreate(Request $request)
    {
      
        try {

    
            $user_id = Auth::id();
            $img = $request->file('father_image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $father_image = "uploads/father-img/{$img_name}";
            $img->move(public_path('uploads/father-img'), $img_name);


            $img = $request->file('mother_image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $mother_image = "uploads/mother-img/{$img_name}";
            $img->move(public_path('uploads/mother-img'), $img_name);


            $img = $request->file('guardian_image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $guardian_image = "uploads/guardian-img/{$img_name}";
            $img->move(public_path('uploads/guardian-img'), $img_name);

            // Create a new Guardian instance

            GradianInfo::create([
                'father_image' => $father_image,
                'mother_image' => $mother_image,
                'guardian_image' => $guardian_image,
                'student_id' => $request->input('student_id'),
                'father_name' => $request->input('father_name'),
                'mother_name' => $request->input('mother_name'),
                'guardian_name' => $request->input('guardian_name'),
                'guardian_email' => $request->input('guardian_email'),
                'father_mobile' => $request->input('father_mobile'),
                'mother_mobile' => $request->input('mother_mobile'),
                'guardian_mobile' => $request->input('guardian_mobile'),
                'guardian_address' => $request->input('guardian_address'),
                'father_profession' => $request->input('father_profession'),
                'mother_profession' => $request->input('mother_profession'),
                'guardian_profession' => $request->input('guardian_profession'),
                'guardian_relation' => $request->input('guardian_relation'),
                'status' => $request->input('status'),
                'user_id' => $user_id
            ]);
          

            return response()->json(['status' => 'success', 'message' => 'Guardian information saved successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    

    function GradianInfoByID(Request $request)
    {
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);
            ;

            $rows = GradianInfo::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

     
    function GradianInfoUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $HomeContentUpdate = GradianInfo::find($request->input('id'));

            if (!$HomeContentUpdate || $HomeContentUpdate->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Graduian Info Page not found or unauthorized access.']);
            }

            // Update the cast information
            $HomeContentUpdate->student_id = $request->input('student_id');
            $HomeContentUpdate->father_name = $request->input('father_name');
            $HomeContentUpdate->mother_name = $request->input('mother_name');
            $HomeContentUpdate->guardian_name = $request->input('guardian_name');
            $HomeContentUpdate->guardian_email = $request->input('guardian_email');
            $HomeContentUpdate->father_mobile = $request->input('father_mobile');
            $HomeContentUpdate->mother_mobile = $request->input('mother_mobile');
            $HomeContentUpdate->guardian_mobile = $request->input('guardian_mobile');
            $HomeContentUpdate->guardian_address = $request->input('guardian_address');
            $HomeContentUpdate->father_profession = $request->input('father_profession');
            $HomeContentUpdate->mother_profession = $request->input('mother_profession');
            $HomeContentUpdate->guardian_profession = $request->input('guardian_profession');
            $HomeContentUpdate->guardian_relation = $request->input('guardian_relation');
            $HomeContentUpdate->status = $request->input('status');

            if ($request->hasFile('father_image')) {
                $img = $request->file('father_image');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/father-img/{$img_name}";

                // Upload File
                $img->move(public_path('uploads/father-img'), $img_name);


                if ($HomeContentUpdate->father_image && file_exists(public_path($HomeContentUpdate->father_image))) {
                    unlink(public_path($HomeContentUpdate->father_image));
                }
                $HomeContentUpdate->father_image = $img_url;
            }

            if ($request->hasFile('mother_image')) {
                $img = $request->file('mother_image');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/mother-img/{$img_name}";

                // Upload File
                $img->move(public_path('uploads/mother-img'), $img_name);


                if ($HomeContentUpdate->mother_image && file_exists(public_path($HomeContentUpdate->mother_image))) {
                    unlink(public_path($HomeContentUpdate->mother_image));
                }
                $HomeContentUpdate->mother_image = $img_url;
            }

            if ($request->hasFile('guardian_image')) {
                $img = $request->file('guardian_image');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/guardian-img/{$img_name}";

                // Upload File
                $img->move(public_path('uploads/guardian-img'), $img_name);


                if ($HomeContentUpdate->guardian_image && file_exists(public_path($HomeContentUpdate->guardian_image))) {
                    unlink(public_path($HomeContentUpdate->guardian_image));
                }
                $HomeContentUpdate->guardian_image = $img_url;
            }


            $HomeContentUpdate->save();

            return response()->json(['status' => 'success', 'message' => 'Graduian Info Page Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    
    function GradianInfoDelete(Request $request)
{
    try {
        $request->validate([
            'id' => 'required|string|min:1'
        ]);

        $cast_id = $request->input('id');
        $Home_delete = GradianInfo::find($cast_id);

        if (!$Home_delete) {
            return response()->json(['status' => 'fail', 'message' => 'Home content not found.']);
        }

        // Delete associated images
        if ($Home_delete->father_image && file_exists(public_path($Home_delete->father_image))) {
            unlink(public_path($Home_delete->father_image));
        }

        if ($Home_delete->mother_image && file_exists(public_path($Home_delete->mother_image))) {
            unlink(public_path($Home_delete->mother_image));
        }

        if ($Home_delete->guardian_image && file_exists(public_path($Home_delete->guardian_image))) {
            unlink(public_path($Home_delete->guardian_image));
        }

        // Delete Home content
        $Home_delete->delete();

        return response()->json(['status' => 'success', 'message' => 'Gradian Info  deleted successfully']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}



}






