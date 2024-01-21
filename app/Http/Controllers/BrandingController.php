<?php

namespace App\Http\Controllers;
use App\Models\Branding;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BrandingController extends Controller
{
    public function BrandingCreate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "back-end/image/branding-logo/{$img_name}";
            $img->move(public_path('back-end/image/branding-logo'), $img_name);

            Branding::create([
                'logo' => $img_url,
                'nameBangla' => $request->input('nameBangla'),
                'nameEnglish' => $request->input('nameEnglish'),
                'address' => $request->input('address'),
                'eiin' => $request->input('eiin'),
                'code' => $request->input('code'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => 'Request Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function BrandingList()
    {
        try {
            $user_id = Auth::id();
            $branding_data = Branding::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'branding_data' => $branding_data]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function BrandingByID(Request $request)
    {
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);
            ;

            $rows = Branding::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function BrandingUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $branding = Branding::find($request->input('id'));

            if (!$branding || $branding->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Branding not found or unauthorized access.']);
            }

            // Update the branding information
            $branding->nameBangla = $request->input('nameBangla');
            $branding->nameEnglish = $request->input('nameEnglish');
            $branding->address = $request->input('address');
            $branding->eiin = $request->input('eiin');
            $branding->code = $request->input('code');

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "back-end/image/branding-logo/{$img_name}";

                // Upload File
                $img->move(public_path('back-end/image/branding-logo'), $img_name);


                if ($branding->logo && file_exists(public_path($branding->logo))) {
                    unlink(public_path($branding->logo));
                }
                $branding->logo = $img_url;
            }


            $branding->save();

            return response()->json(['status' => 'success', 'message' => 'Request Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function BrandingDelete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);

            $branding_id = $request->input('id');
            $branding = Branding::find($branding_id);

            if (!$branding) {
                return response()->json(['status' => 'fail', 'message' => 'Branding not found.']);
            }

            if ($branding->logo && file_exists(public_path($branding->logo))) {
                unlink(public_path($branding->logo));
            }

            Branding::where('id', $branding_id)->delete();

            return response()->json(['status' => 'success', 'message' => 'Request Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



}