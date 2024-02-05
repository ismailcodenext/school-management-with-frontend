<?php

namespace App\Http\Controllers;

use App\Models\BlogNews;
use App\Models\PhotoGallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogNewsController extends Controller
{
    function BlogNewsList(Request $request){
        try {
            $user_id=Auth::id();
            $blogNewsData= BlogNews::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'blogNewsData' => $blogNewsData]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function BlogNewsCreate(Request $request){
        try {
            $user_id=Auth::id();
            $img=$request->file('img');

            $t=time();
            $file_name=$img->getClientOriginalName();
            $img_name="{$user_id}-{$t}-{$file_name}";
            $img_url="uploads/blog_news_img/{$img_name}";


            // Upload File
            $img->move(public_path('uploads/blog_news_img'),$img_name);

            BlogNews::create([
                'title'=>$request->input('blogNewsTitle'),
                'details'=>$request->input('blogNewsDetails'),
                'category'=>$request->input('blogNewsCategory'),
                'user_id'=>$user_id,
                'img_url'=>$img_url

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function BlogNewsDelete(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate([
                'id' => 'required|string',
            ]);

            $blog_news = BlogNews::where('id', $request->input('id'))->where('user_id', $user_id)->first();

            if (!$blog_news) {
                return response()->json(['status' => 'fail', 'message' => 'Photo not found or unauthorized access.']);
            }

            // Delete the image file from the uploads directory
            if ($blog_news->img_url && File::exists(public_path($blog_news->img_url))) {
                File::delete(public_path($blog_news->img_url));
            }

            // Delete the teacher record from the database
            $blog_news->delete();

            return response()->json(['status' => 'success', 'message' => 'Photo deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function BlogNewsUpdate(Request $request){
        try {
            $user_id = Auth::id();
            $blog_news_data = BlogNews::find($request->input('id'));

            if (!$blog_news_data || $blog_news_data->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Blog News not found or unauthorized access.']);
            }
//            $request->validate([
//                'id' => 'required|string',
//                'principal_name' => 'required|string',
//                'designation' => 'required|string',
//                'principal_message' => 'required|string',
//                // Add other validation rules as needed
//            ]);

            // Update fields
            $blog_news_data->title = $request->input('title');
            $blog_news_data->details = $request->input('details');
            $blog_news_data->category = $request->input('category');

            // Update image file if provided
            if ($request->hasFile('img_url')) {
                // Delete the existing image file from the uploads directory
                if ($blog_news_data->img_url && File::exists(public_path($blog_news_data->img_url))) {
                    File::delete(public_path($blog_news_data->img_url));
                }

                // Upload the new image file
                $img = $request->file('img_url');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/blog_news_img/{$img_name}";

                // Move and save the new image
                $img->move(public_path('uploads/blog_news_img/'), $img_name);

                // Update the institution_image field
                $blog_news_data->img_url = $img_url;
            }

            // Save the changes
            $blog_news_data->save();

            return response()->json(['status' => 'success', 'message' => 'Blog News updated successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function BlogNewsByID(Request $request){
        try {
            $user_id=Auth::id();
            $request->validate(["id"=> 'required|string']);
            $rows= BlogNews::where('id',$request->input('id'))->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


}
