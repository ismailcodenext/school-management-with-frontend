<?php

namespace App\Http\Controllers;
use App\Models\Group;
use Exception;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    
    public function GroupCreate(Request $request):JsonResponse
    {
        try {
            $request->validate([
                'group_name' => 'required|string|max:200',
            ]);
            $user_id = Auth::id();
            Group::create([
                'group_name'=>$request->input('group_name'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Group Name Is Create Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    public function GroupList()
    {
        try {
            $user_id = Auth::id();
            $group_data= Group::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'group_data' => $group_data]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    public function GroupByID(Request $request){
        try {
            $request->validate([
                'id' => 'required|min:1'
            ]);
            $group_id = $request->input('id');
            $user_id = Auth::id();
            $rows= Group::where('id', $group_id)->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }

    public function GroupUpdate(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|min:1',
                'group_name' => 'required|string|max:100'
            ]);

            $group_id = $request->input('id');
            $user_id=Auth::id();
             Group::where('id',$group_id)->where('user_id',$user_id)->update([
                'group_name' => $request->input('group_name')
            ]);

            return response()->json(['status' => 'success', 'message' => 'Group Name updated successfully']);

        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function GroupDelete(Request $request){
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $group_id=$request->input('id');
            Group::where('id',$group_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Group Name Delete Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
