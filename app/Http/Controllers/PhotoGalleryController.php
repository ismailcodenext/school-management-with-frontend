<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
