<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

//Authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Public routes
Route::prefix('/products')->group(function(){
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'show']);
});
Route::get('/categories', [CategoryController::class, 'allCategories']);
Route::get('/categories/{category}', [CategoryController::class, 'categoryProducts']);

Route::middleware('auth:sanctum')->group(function(){
    //User Routes
    Route::prefix("user")->group(function(){
        Route::get("/info", [UserController::class, 'info']);
        Route::put("/update", [UserController::class, 'update']);
    });
    Route::prefix("/orders")->group(function(){
        Route::get("/", [OrderController::class, "userOrders"]);
        Route::get("/{order}", [OrderController::class, "show"]);
        Route::post("/new", [OrderController::class, "create"]); 
    });
    
    //Admin routes
    Route::group(['middleware' => ['role:super-admin']], function () {
        //Admin routes for Products managment
        Route::prefix("/products")->group(function(){
            Route::post("/create", [ProductController::class, "create"]);
            Route::put("/{product}", [ProductController::class, "update"]);
            Route::delete("/{product}", [ProductController::class, "destroy"]);
        });
        //Admin routes for Users managment
        Route::prefix('users')->group(function(){
            Route::get('/', [UserController::class, 'index']);
            Route::get('/{user}', [UserController::class, 'destroy']);
        });
        
        //Admin routes for Orders managment
        Route::prefix('/orders')->group(function(){
            Route::get("/", [OrderController::class, "index"]);
            Route::delete("/{order}", [OrderController::class, "destroy"]);
        });
        
    });
    
});
