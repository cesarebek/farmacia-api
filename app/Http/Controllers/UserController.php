<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{ 
  //All Users Registered
  public function index(){
    //Catching all the signed users
    $users = User::all();
    foreach($users as $user){
      $user->roles;
    }
    //Response
    return response()->json(['data' => $users]);
  }
  
  //User Authenticated Info
  public function info(){
    //Catching the authenticated user
    $user = Auth::user();
    $user->roles;
    //Response for unlogged user
    if($user === null){
      return response()->json(['message' => 'Please login.']);
    }
    //Response
    return response()->json(['data' => $user]);
  }

  //User Delete
  public function destroy(User $user){
    //Check if user exists
    if(is_null($user)){
      return response()->json(['message' => 'User not found.']);
    }
  }
}
