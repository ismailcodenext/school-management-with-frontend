<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use App\Models\PhotoGallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HeroSliderController extends Controller
{
        function HeroSliderList(Request $request){
            try {
                $user_id=Auth::id();
                $heroSliderData= HeroSlider::where('user_id',$user_id)->get();
                return response()->json(['status' => 'success', 'heroSliderData' => $heroSliderData]);
            }catch (Exception $e){
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }

        function HeroSliderCreate(Request $request){
            try {
                $user_id=Auth::id();
                $img=$request->file('img');

                $t=time();
                $file_name=$img->getClientOriginalName();
                $img_name="{$user_id}-{$t}-{$file_name}";
                $img_url="uploads/hero_slider_img/{$img_name}";


                // Upload File
                $img->move(public_path('uploads/hero_slider_img/'),$img_name);

                HeroSlider::create([
                    'title'=>$request->input('heroSliderTitle'),
                    'subtitle'=>$request->input('heroSliderSubTitle'),
                    'user_id'=>$user_id,
                    'img_url'=>$img_url

                ]);
                return response()->json(['status' => 'success', 'message' => "Request Successful"]);
            }catch (Exception $e){
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }

        function HeroSliderDelete(Request $request){
            try {
                $user_id = Auth::id();
                $request->validate([
                    'id' => 'required|string',
                ]);

                $hero_slider = HeroSlider::where('id', $request->input('id'))->where('user_id', $user_id)->first();

                if (!$hero_slider) {
                    return response()->json(['status' => 'fail', 'message' => 'Hero Slider not found or unauthorized access.']);
                }

                // Delete the image file from the uploads directory
                if ($hero_slider->img_url && File::exists(public_path($hero_slider->img_url))) {
                    File::delete(public_path($hero_slider->img_url));
                }

                // Delete the teacher record from the database
                $hero_slider->delete();

                return response()->json(['status' => 'success', 'message' => 'Hero Slider deleted successfully']);
            } catch (Exception $e) {
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }

    function HeroSliderByID(Request $request){
        try {
            $user_id=Auth::id();
            $request->validate(["id"=> 'required|string']);
            $rows= HeroSlider::where('id',$request->input('id'))->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function HeroSliderUpdate(Request $request){
        try {
            $user_id = Auth::id();
            $hero_slider_data = HeroSlider::find($request->input('id'));

            if (!$hero_slider_data || $hero_slider_data->user_id != $user_id) {
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
            $hero_slider_data->title = $request->input('title');
            $hero_slider_data->subtitle = $request->input('subtitle');

            // Update image file if provided
            if ($request->hasFile('img_url')) {
                // Delete the existing image file from the uploads directory
                if ($hero_slider_data->img_url && File::exists(public_path($hero_slider_data->img_url))) {
                    File::delete(public_path($hero_slider_data->img_url));
                }

                // Upload the new image file
                $img = $request->file('img_url');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/hero_slider_img/{$img_name}";

                // Move and save the new image
                $img->move(public_path('uploads/hero_slider_img/'), $img_name);

                // Update the institution_image field
                $hero_slider_data->img_url = $img_url;
            }

            // Save the changes
            $hero_slider_data->save();

            return response()->json(['status' => 'success', 'message' => 'Hero Slider updated successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }





}
