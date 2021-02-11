<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Products
Route::prefix('/products')->group(function(){
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'show']);
});

//Personal Section
Route::middleware('auth:sanctum')->group(function(){
    Route::prefix("user")->group(function(){
        Route::get("/", [UserController::class, "info"]);
    });
    Route::prefix("/orders")->group(function(){
        Route::get("/", [OrderController::class, "index"]);
        Route::get("/{order}", [OrderController::class, "show"]);
        Route::post("/new", [OrderController::class, "create"]); 
    });
    Route::prefix("/products")->group(function(){
        Route::post("/create", [ProductController::class, "create"]);
    });
});
