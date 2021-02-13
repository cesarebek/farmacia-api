<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
  use HasRoles;
  //All Users Registered
  public function index(){
    //Catching all the signed users
    $users = User::all();
    //Response
    return response()->json(['data' => $users]);
  }
  
  //User Authenticated Info
  public function info(){
    //Catching the authenticated user
    $user = Auth::user();
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

  //Check the role of the user
    public function checkRole(){
        if(!Auth::user()->hasRole('super-admin')){
            return response()->json(['message' => 'User not authorized for this route.', 'authorization' => false], 204);
        }else{
            return response()->json(['message' => 'User authorized.', 'authorization' => true], 200);
        }
    }
}
