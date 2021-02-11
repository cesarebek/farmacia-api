<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
 
    public function index()
    {
        $products = Product::all();
        return response()->json(['products'=>$products]);
    }

    public function create(Request $req)
    {
         $validator = Validator::make($req->all(), [
            "title" => "required",
            "price" => "required|integer",
            "stock"=> "required|integer"
        ]);

        if($validator->fails()) {
            return response()->json(["message" => $validator->errors()]);
        }

        $product = Product::create($req->all());

        return response()->json(["data" => $product]);
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
