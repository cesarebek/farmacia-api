<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $numberCat = $categories->count();
        return response()->json(['categories_count' => $numberCat, 'data' => $categories]);
    }
}
