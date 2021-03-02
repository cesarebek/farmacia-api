<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    
    //Display all products
    public function index()
    {   
        //Whole products of the store
        $products = Product::all();
        return response()->json(['data' => $products]);
    }

    //Create a new product
    public function create(Request $req){
        //Inputs must be...
        $validator = Validator::make($req->all(), [
            "title" => "required|string",
            "description" => "required|string",
            "price" => "numeric|numeric",
            "stock" => "required|integer",
            "product_image" => "image|max:1999|required",
        ]);
        //Inputs validion  
        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()]);
        }
        if(Product::where('title', $req->title)){
            return response()->json(['message' => 'Questo nome è già stato assegnato ad un altro prodotto.']);
        }
        //Upload image
        $localStore = $req->file('product_image')->store('public/product_images');
        
        $path = Storage::url($localStore);
        //Get host
        $host = $req->getSchemeAndHttpHost();
        
        $inputs = $req->all();
        //Assigning image path
        $inputs['product_image'] = $host.$path;
        // Creating product
        $product = Product::create($inputs);
        //Product created response
        return response()->json(['message' => 'Prodotto aggiunto con successo!', 'data' => $product]);
         
    }

    //Display specific product
    public function show(Product $product)
    {   
        $category = Category::find($product->category_id);
        //Specific product response
        return response()->json(['data' => $product, 'category' => $category]);
    }

    //Update a product
    public function update(Product $product, Request $req){   
        if(is_null($product)){
            return response()->json(['message' => 'Prodotto non trovato.']);
        }
        //Inputs must be...
        $validator = Validator::make($req->all(), [
         'title' => 'string', 
         'description' => 'string', 
         'stock' => 'integer', 
         'price' => 'numeric',
        ]);
        //Inputs validion
        if($validator->fails()){
            return response()->json(['message' => $validator->errors()]);
        }
        //Updating product
        $productUpdate = $product->update($req->all());
        //Product updated response
        return response()->json(['message' => 'Prodotto aggiornato con successo!', 'data' => $productUpdate]);
    }

    //Delete a product
    public function destroy(Product $product){
        //Check if product exists
        if(is_null($product)){
            return response()->json(['message' => 'Prodotto non trovato.']);
        }
        //Deliting
        $product->delete();
        //Response
        return response()->json(['message' => 'Prodotto eliminato con successo!']);
    }
}
