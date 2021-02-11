<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register
    public function register(Request $req) {
        $validator = Validator::make($req->all(), [
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
        ]);

        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()]);
        }

        if(User::where('email', $req['email'])->exists()){
            return response()->json([
                "message"=>"User already exist, please login"
            ], 400);
        }

        $req["password"] = Hash::make($req["password"]);

        $user = User::create($req->all());

        return response()->json(["message" => "Success! registration completed", "data" => $user]);
           
    }

    // Login
    public function login(Request $req) {

        $validator = Validator::make($req->all(), [
            "email" =>  "required|email",
            "password" =>  "required",
        ]);

        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()]);
        }

        $user = User::where("email", $req->email)->first();

        if(is_null($user)) {
            return response()->json(["message" => "Failed! email not found"]);
        }

        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'message'=>'User successfully logged!',
            "token" => $token, 
            "data" => $user
            ]);
        } else {
            return response()->json([
                "message" => "Whoops! invalid password"
            ]);
        }
    }
}
