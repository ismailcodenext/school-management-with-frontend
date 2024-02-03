<?php

namespace App\Http\Controllers;

use App\Models\BlogNews;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}
