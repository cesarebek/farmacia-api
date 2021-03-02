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
        //Inputs must be...
        $validator = Validator::make($req->all(), [
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
        ]);
        
        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()]);
        }
        //Check if user already exists
        if(User::where('email', $req['email'])->exists()){
            return response()->json([
                "message"=>"Questa e-mail risulta già registrata. Effettua la login."
            ], 400);
        }
        //Hashing password
        $req["password"] = Hash::make($req["password"]);
        //Creating user
        $user = User::create($req->all());
        //Assign 'customer' role to newly created user
        $user->assignRole('customer');
        //Token creation
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            "message" => "Registrazione completata!", 
            "token" => $token,
            "data" => $user
        ]);
           
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
            return response()->json(["message" => "Non è stato trovato un account associato a questa e-mail."],401);
        }

        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            
        $token = $user->createToken('token')->plainTextToken;
        $user->roles;
        return response()->json([
            'message'=>"L'autenticazione è andata a buon fine!",
            "token" => $token, 
            "data" => $user,
        ]);
        } else {
            return response()->json([
                "message" => "Whoops! Password errata, riprova!"
            ], 401);
        }
    }
}
