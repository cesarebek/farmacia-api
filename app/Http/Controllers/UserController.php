<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  //All Users Registered
  public function index(){
    $users = User::all();
    return response()->json(['data' => $users]);
  }
  
  public function info(){
    $user = Auth::user();
    return response()->json(['data' => $user]);
  }
}
