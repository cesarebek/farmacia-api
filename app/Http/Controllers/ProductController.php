<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    
    public function index()
    {   
        //Whole products of the store
        $products = Product::all();
        return response()->json(['products'=>$products]);
    }

    public function create(Request $req){
        //Inputs must be...
        $validator = Validator::make($req->all(), [
            "title" => "required",
            "price" => "required|integer",
            "stock"=> "required|integer"
        ]);
        //Inputs validion  
        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()]);
        }
        //Creating product
        $product = Product::create($req->all());
        //Product created response
        return response()->json(['message'=>'Product created successfully', 'data' => $product]);
         
    }

    public function show(Product $product)
    {   
        //Specific product response
        return response()->json(['data' => $product]);
    }


    public function update(Product $product, Request $req){   
        //Inputs must be...
        $validator = Validator::make($req->all(), [
         'title' => 'string|required', 
         'description' => 'string|required', 
         'stock' => 'integer|required', 
         'price' => 'integer|required', 
        ]);
        //Inputs validion
        if($validator->fails()){
            return response()->json(['message' => $validator->errors()]);
        }
        //Check if product exists
        if(is_null($product)){
            return response()->json(['message' => 'Product not found.']);
        }
        //Updating product
        $productUpdate = $product->update($req->all());
        //Product updated response
        return response()->json(['message' => 'Product updated successfully.', 'data' => $productUpdate]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
