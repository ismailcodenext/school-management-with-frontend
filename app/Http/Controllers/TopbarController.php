<?php

namespace App\Http\Controllers;
use App\Models\Topbar;
use Exception;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TopbarController extends Controller
{

    public function index(){
        $topbar=Topbar::first();
        return  ResponseHelper::Out('success',$topbar,200);
    }

    public function TopbarCreate(Request $request):JsonResponse
    {
        try {
            $request->validate([
                'address' => 'required|string|max:100',
                'contact' => 'required|string|min:11',
                'email' => 'required|string|email|max:100'
            ]);
            $user_id = Auth::id();
            Topbar::create([
                'address'=>$request->input('address'),
                'contact'=>$request->input('contact'),
                'email'=>$request->input('email'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    public function TopbarList()
    {
        try {
            $user_id = Auth::id();
            $topbar_data= Topbar::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'topbar_data' => $topbar_data]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function TopbarByID(Request $request){
        try {
            $request->validate([
                'id' => 'required|min:1'
            ]);
            $topbar_id = $request->input('id');
            $user_id = Auth::id();
            $rows= Topbar::where('id', $topbar_id)->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }

    public function TopbarUpdate(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|min:1',
                'address' => 'required|string|max:100',
                'contact' => 'required|string|min:11',
                'email' => 'required|string|email|max:100'
            ]);

            $topbar_id = $request->input('id');
            $user_id=Auth::id();
             Topbar::where('id',$topbar_id)->where('user_id',$user_id)->update([
                'address' => $request->input('address'),
                'contact' => $request->input('contact'),
                'email' => $request->input('email')
            ]);
    
            return response()->json(['status' => 'success', 'message' => 'Topbar updated successfully']);
    
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function TopbarDelete(Request $request){
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $topbar_id=$request->input('id');
            Topbar::where('id',$topbar_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
    

}