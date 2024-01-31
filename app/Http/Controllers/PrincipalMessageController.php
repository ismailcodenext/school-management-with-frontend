<?php

namespace App\Http\Controllers;

use App\Models\InstituteHistory;
use App\Models\PrincipalMessage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PrincipalMessageController extends Controller
{
    function PrincipalMessageList(Request $request){
        try {
            $user_id=Auth::id();
            $principalMessageData= PrincipalMessage::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'principalMessageData' => $principalMessageData]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function PrincipalMessageCreate(Request $request){
        try {
            $user_id=Auth::id();
            $img=$request->file('img');

            $t=time();
            $file_name=$img->getClientOriginalName();
            $img_name="{$user_id}-{$t}-{$file_name}";
            $img_url="uploads/principal_img/{$img_name}";


            // Upload File
            $img->move(public_path('uploads/principal_img'),$img_name);

            PrincipalMessage::create([
                'principal_name'=>$request->input('principalName'),
                'designation'=>$request->input('principalDesignation'),
                'principal_message'=>$request->input('principalMessage'),
                'user_id'=>$user_id,
                'img_url'=>$img_url

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function PrincipalMessageByID(Request $request)
    {
        try {
            $user_id=Auth::id();
            $request->validate(["id"=> 'required|string']);
            $rows= PrincipalMessage::where('id',$request->input('id'))->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function PrincipalMessageDelete(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate([
                'id' => 'required|string',
            ]);

            $principal_message = PrincipalMessage::where('id', $request->input('id'))->where('user_id', $user_id)->first();

            if (!$principal_message) {
                return response()->json(['status' => 'fail', 'message' => 'Principal Message not found or unauthorized access.']);
            }

            // Delete the image file from the uploads directory
            if ($principal_message->img_url && File::exists(public_path($principal_message->img_url))) {
                File::delete(public_path($principal_message->img_url));
            }

            // Delete the teacher record from the database
            $principal_message->delete();

            return response()->json(['status' => 'success', 'message' => 'Principal message deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function PrincipalMessageUpdate(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate([
                'id' => 'required|string',
//                'institution_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation as needed
                'principal_name' => 'required|string',
                'designation' => 'required|string',
                'principal_message' => 'required|string',
                // Add other validation rules as needed
            ]);

            $principal_message = PrincipalMessage::where('id', $request->input('id'))->where('user_id', $user_id)->first();

            if (!$principal_message) {
                return response()->json(['status' => 'fail', 'message' => 'Principal Message not found or unauthorized access.']);
            }

            // Update fields
            $principal_message->principal_message = $request->input('institution_description');

            // Update image file if provided
            if ($request->hasFile('img_url')) {
                // Delete the existing image file from the uploads directory
                if ($principal_message->img_url && File::exists(public_path($principal_message->img_url))) {
                    File::delete(public_path($principal_message->img_url));
                }

                // Upload the new image file
                $img = $request->file('img_url');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/{$img_name}";

                // Move and save the new image
                $img->move(public_path('uploads'), $img_name);

                // Update the institution_image field
                $principal_message->institution_image = $img_url;
            }

            // Save the changes
            $principal_message->save();

            return response()->json(['status' => 'success', 'message' => 'Principal Message updated successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }

}
