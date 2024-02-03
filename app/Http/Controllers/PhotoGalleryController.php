<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use App\Models\PrincipalMessage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PhotoGalleryController extends Controller
{
    function PhotoGalleryList(Request $request){
        try {
            $user_id=Auth::id();
            $photoGalleryData= PhotoGallery::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'photoGalleryData' => $photoGalleryData]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function PhotoGalleryCreate(Request $request){
        try {
            $user_id=Auth::id();
            $img=$request->file('img');

            $t=time();
            $file_name=$img->getClientOriginalName();
            $img_name="{$user_id}-{$t}-{$file_name}";
            $img_url="uploads/photo_gallery_img/{$img_name}";


            // Upload File
            $img->move(public_path('uploads/photo_gallery_img'),$img_name);

            PhotoGallery::create([
                'title'=>$request->input('photoTitle'),
                'category'=>$request->input('photoCategory'),
                'user_id'=>$user_id,
                'img_url'=>$img_url

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function PhotoGalleryByID(Request $request){
        try {
            $user_id=Auth::id();
            $request->validate(["id"=> 'required|string']);
            $rows= PhotoGallery::where('id',$request->input('id'))->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function PhotoGalleryDelete(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate([
                'id' => 'required|string',
            ]);

            $photo_gallery = PhotoGallery::where('id', $request->input('id'))->where('user_id', $user_id)->first();

            if (!$photo_gallery) {
                return response()->json(['status' => 'fail', 'message' => 'Photo not found or unauthorized access.']);
            }

            // Delete the image file from the uploads directory
            if ($photo_gallery->img_url && File::exists(public_path($photo_gallery->img_url))) {
                File::delete(public_path($photo_gallery->img_url));
            }

            // Delete the teacher record from the database
            $photo_gallery->delete();

            return response()->json(['status' => 'success', 'message' => 'Photo deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function PhotoGalleryUpdate(Request $request){
        try {
            $user_id = Auth::id();
            $photo_gallery_data = PhotoGallery::find($request->input('id'));

            if (!$photo_gallery_data || $photo_gallery_data->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Photo not found or unauthorized access.']);
            }
//            $request->validate([
//                'id' => 'required|string',
//                'principal_name' => 'required|string',
//                'designation' => 'required|string',
//                'principal_message' => 'required|string',
//                // Add other validation rules as needed
//            ]);

            // Update fields
            $photo_gallery_data->title = $request->input('title');
            $photo_gallery_data->category = $request->input('category');

            // Update image file if provided
            if ($request->hasFile('img_url')) {
                // Delete the existing image file from the uploads directory
                if ($photo_gallery_data->img_url && File::exists(public_path($photo_gallery_data->img_url))) {
                    File::delete(public_path($photo_gallery_data->img_url));
                }

                // Upload the new image file
                $img = $request->file('img_url');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/photo_gallery_img/{$img_name}";

                // Move and save the new image
                $img->move(public_path('uploads/photo_gallery_img/'), $img_name);

                // Update the institution_image field
                $photo_gallery_data->img_url = $img_url;
            }

            // Save the changes
            $photo_gallery_data->save();

            return response()->json(['status' => 'success', 'message' => 'Principal Message updated successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

}
