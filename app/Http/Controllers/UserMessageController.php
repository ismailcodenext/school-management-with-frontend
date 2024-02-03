<?php

namespace App\Http\Controllers;
use App\Models\User_Message;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function UserMessageCreate(Request $request)
    {
        try {
            $user_id = Auth::id();

            User_Message::create([
                'name' => $request->input ('name'),
                'email' => $request->input('email'),
                'number' => $request->input('number'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => 'Message Send  Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

}
