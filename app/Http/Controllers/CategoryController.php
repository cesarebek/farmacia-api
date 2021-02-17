<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories(){
        $categories = Category::all();
        $numberCat = $categories->count();
        return response()->json(['categories_count' => $numberCat, 'data' => $categories]);
    }

    public function categoryProducts(Category $category){
        $items = $category->products;
        return response()->json(['category_name' => $category->name, 'data' => $items]);
    }
}
