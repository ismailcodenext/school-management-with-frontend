<?php

namespace App\Http\Controllers;
use App\Models\Section;
use Exception;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function SectionCreate(Request $request):JsonResponse
    {
        try {
            $request->validate([
                'section_name' => 'required|string|max:200',
            ]);
            $user_id = Auth::id();
            Section::create([
                'section_name'=>$request->input('section_name'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Section Name Is Create Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    public function SectionList()
    {
        try {
            $user_id = Auth::id();
            $section_data= Section::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'section_data' => $section_data]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    public function SectionByID(Request $request){
        try {
            $request->validate([
                'id' => 'required|min:1'
            ]);
            $section_id = $request->input('id');
            $user_id = Auth::id();
            $rows= Section::where('id', $section_id)->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }

    public function SectionUpdate(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|min:1',
                'section_name' => 'required|string|max:100'
            ]);

            $Section_id = $request->input('id');
            $user_id=Auth::id();
             Section::where('id',$Section_id)->where('user_id',$user_id)->update([
                'section_name' => $request->input('section_name')
            ]);

            return response()->json(['status' => 'success', 'message' => 'Section Name updated successfully']);

        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function SectionDelete(Request $request){
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $section_id=$request->input('id');
            Section::where('id',$section_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Section Name Delete Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


}
