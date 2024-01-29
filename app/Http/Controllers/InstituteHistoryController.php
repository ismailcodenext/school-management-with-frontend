<?php

namespace App\Http\Controllers;

use App\Models\InstituteHistory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class InstituteHistoryController extends Controller
{
    function InstituteHistoryCreate(Request $request){
        try {
            $user_id=Auth::id();
            $img=$request->file('img');

            $t=time();
            $file_name=$img->getClientOriginalName();
            $img_name="{$user_id}-{$t}-{$file_name}";
            $img_url="uploads/institute_img/{$img_name}";


            // Upload File
            $img->move(public_path('uploads/institute_img'),$img_name);

            InstituteHistory::create([
                'institution_description'=>$request->input('institutionDescription'),
                'user_id'=>$user_id,
                'institution_image'=>$img_url

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

}

function InstituteHistoryList(Request $request){
    try {
        $user_id=Auth::id();
        $institutionHistoryData= InstituteHistory::where('user_id',$user_id)->get();
        return response()->json(['status' => 'success', 'institutionHistoryData' => $institutionHistoryData]);
    }catch (Exception $e){
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

function InstituteHistoryDelete(Request $request){
    try {
        $user_id = Auth::id();
        $request->validate([
            'id' => 'required|string',
        ]);

        $institute_history = InstituteHistory::where('id', $request->input('id'))->where('user_id', $user_id)->first();

        if (!$institute_history) {
            return response()->json(['status' => 'fail', 'message' => 'Institution History not found or unauthorized access.']);
        }

        // Delete the image file from the uploads directory
        if ($institute_history->institution_image && File::exists(public_path($institute_history->institution_image))) {
            File::delete(public_path($institute_history->institution_image));
        }

        // Delete the teacher record from the database
        $institute_history->delete();

        return response()->json(['status' => 'success', 'message' => 'Institute History deleted successfully']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

    function InstituteHistoryByID(Request $request)
    {
        try {
            $user_id=Auth::id();
            $request->validate(["id"=> 'required|string']);
            $rows= InstituteHistory::where('id',$request->input('id'))->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function InstituteHistoryUpdate(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate([
                'id' => 'required|string',
//                'institution_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation as needed
                'institution_description' => 'required|string',
                // Add other validation rules as needed
            ]);

            $institute_history = InstituteHistory::where('id', $request->input('id'))->where('user_id', $user_id)->first();

            if (!$institute_history) {
                return response()->json(['status' => 'fail', 'message' => 'Institution History not found or unauthorized access.']);
            }

            // Update fields
            $institute_history->institution_description = $request->input('institution_description');

            // Update image file if provided
            if ($request->hasFile('institution_image')) {
                // Delete the existing image file from the uploads directory
                if ($institute_history->institution_image && File::exists(public_path($institute_history->institution_image))) {
                    File::delete(public_path($institute_history->institution_image));
                }

                // Upload the new image file
                $img = $request->file('institution_image');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/{$img_name}";

                // Move and save the new image
                $img->move(public_path('uploads'), $img_name);

                // Update the institution_image field
                $institute_history->institution_image = $img_url;
            }

            // Save the changes
            $institute_history->save();

            return response()->json(['status' => 'success', 'message' => 'Institute History updated successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }




}
