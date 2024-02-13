<?php

namespace App\Http\Controllers;
use App\Models\UserMessage;
use Exception;
use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function UserMessageCreate(Request $request)
    {
        try {
            UserMessage::create([
                'name' => $request->input ('name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),

            ]);
            return response()->json(['status' => 'success', 'message' => 'Message Send  Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

}
