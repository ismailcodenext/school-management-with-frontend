<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\HeroSlider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ClassController extends Controller
{
   function ClassList(){
       try {
           $user_id=Auth::id();
           $classData= Classroom::where('user_id',$user_id)->get();
           return response()->json(['status' => 'success', 'classData' => $classData]);
       }catch (Exception $e){
           return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
       }
   }

   function ClassCreate(Request $request){
       try {
           $user_id=Auth::id();

           Classroom::create([
               'class_name'=>$request->input('className'),
               'user_id'=>$user_id,


           ]);
           return response()->json(['status' => 'success', 'message' => "Class Name Create Successful"]);
       }catch (Exception $e){
           return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
       }
       
   }


   function ClassByID(Request $request){
       try {
           $request->validate([
               'id' => 'required|min:1'
           ]);
           $class_id = $request->input('id');
           $user_id = Auth::id();
           $rows= Classroom::where('id', $class_id)->where('user_id', $user_id)->first();
           return response()->json(['status' => 'success', 'rows' => $rows]);
       }catch (Exception $e){
           return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
       }
   }

   function ClassUpdate(Request $request){
       try {
        $request->validate([
            'id' => 'required|min:1',
            'class_name' => 'required|string|max:100'
        ]);

        $group_id = $request->input('id');
        $user_id=Auth::id();
        Classroom::where('id',$group_id)->where('user_id',$user_id)->update([
            'class_name' => $request->input('class_name')
        ]);

        return response()->json(['status' => 'success', 'message' => 'Class Name updated successfully']);

    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }


   }

   function ClassDelete(Request $request){
    try {
        $user_id = Auth::id();
        $request->validate([
            'id' => 'required|string',
        ]);

        $class = Classroom::where('id', $request->input('id'))->where('user_id', $user_id)->first();

        if (!$class) {
            return response()->json(['status' => 'fail', 'message' => 'Class not found or unauthorized access.']);
        }

        $class->delete();

        return response()->json(['status' => 'success', 'message' => 'Class deleted successfully']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}


}
