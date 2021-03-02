<?php

namespace App\Http\Controllers;


use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function create(Request $req){
        $validator = Validator::make($req->all(), [
            "name" =>  "required",
            "surname" =>  "required",
            "email" =>  "required|email",
            "message" =>  "required",
        ]);

        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()]);
        }

        $message = Message::create($req->all());
        return response()->json(['message' => 'Messaggio inviato correttamente!' , 'data' => $message]);
    }

    public function index(){
        $messages = Message::all();
        return response()->json(['data' => $messages]);
    }

    public function destroy(Message $message){
        $message->delete();
        return response()->json(['message' => 'Messaggio eliminato correttamente!', 'data' => $message]);
    }
}
