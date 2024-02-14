<?php

namespace App\Http\Controllers;

use App\Mail\ContactUserUs;
use App\Models\UserMessage;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function send(Request $request){
        $data =[
            'name'=> $request->name,
            'email'=> $request->email,
            'mobile'=> $request->mobile,
            'subject'=> $request->subject,
            'message'=> $request->message,
                ];
    
                // send email to admin
                Mail::to('robi.cnits@gmail.com')->send(new ContactUserUs($data));
                UserMessage::create([
                    'name' => $request->input ('name'),
                    'email' => $request->input('email'),
                    'mobile' => $request->input('mobile'),
                    'subject' => $request->input('subject'),
                    'message' => $request->input('message'),
    
                ]);
            return redirect('/contact-us');
        }

        public function UserMessageList()
        {
            try {
                $userData = UserMessage::get();
                return response()->json(['status' => 'success', 'userData' => $userData]);
            } catch (Exception $e) {
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }

        public function UserMessageByID(Request $request){
            try {

                $rows = UserMessage::where('id', $request->input('id'))->first();
                return response()->json(['status' => 'success', 'rows' => $rows]);
            } catch (Exception $e) {
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
    
        }

        function UserMessageDelete(Request $request){
            try {
                $request->validate([
                    'id' => 'required|string|min:1'
                ]);
                $message_id=$request->input('id');
                UserMessage::where('id',$message_id)->delete();
                return response()->json(['status' => 'success', 'message' => "User Message Delete Successful"]);
            }catch (Exception $e){
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }
    
    }

