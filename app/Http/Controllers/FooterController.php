<?php

namespace App\Http\Controllers;
use App\Models\Footer;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    function FooterCreate(Request $request){
        try {
            $user_id = Auth::id();
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/footer-logo/{$img_name}";
            $img->move(public_path('uploads/footer-logo'), $img_name);

            Footer::create([
                'img_url' => $img_url,
                'description' => $request->input('description'),
                'facebook' => $request->input('facebook'),
                'twitter' => $request->input('twitter'),
                'youtube' => $request->input('youtube'),
                'linkedin' => $request->input('linkedin'),
                'address' => $request->input('address'),
                'number' => $request->input('number'),
                'email' => $request->input('email'),
                'pageLink' => $request->input('pageLink'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => 'Footer  Create Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function FooterList()
    {
        try {
            $user_id = Auth::id();
            $footer_data = Footer::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'footer_data' => $footer_data]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function FooterByID(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);
            ;

            $rows = Footer::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    public function FooterUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $footer = Footer::find($request->input('id'));

            if (!$footer || $footer->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Footer not found or unauthorized access.']);
            }

            $footer->description = $request->input('description');
            $footer->facebook = $request->input('facebook');
            $footer->twitter = $request->input('twitter');
            $footer->youtube = $request->input('youtube');
            $footer->linkedin = $request->input('linkedin');
            $footer->address = $request->input('address');
            $footer->number = $request->input('number');
            $footer->email = $request->input('email');
            $footer->pageLink = $request->input('pageLink');

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_path = "uploads/footer-logo/{$img_name}";

                // Move and store the uploaded image
                $img->move(public_path('uploads/footer-logo'), $img_name);

                // Delete old image file if it exists
                if ($footer->img_url && File::exists(public_path($footer->img_url))) {
                    File::delete(public_path($footer->img_url));
                }

                $footer->img_url = $img_path;
            }

            $footer->save();

            return response()->json(['status' => 'success', 'message' => 'Footer Update Successful']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
    
    function FooterDelete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);

            $footer_id = $request->input('id');
            $footer = Footer::find($footer_id);

            if (!$footer) {
                return response()->json(['status' => 'fail', 'message' => 'Branding not found.']);
            }

            if ($footer->img_url && file_exists(public_path($footer->img_url))) {
                unlink(public_path($footer->img_url));
            }

            Footer::where('id', $footer_id)->delete();

            return response()->json(['status' => 'success', 'message' => 'Footer Section Delete Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

}
