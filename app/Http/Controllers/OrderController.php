<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{   
    //All Orders
    public function index(){
      $orders = Order::all();
      foreach($orders as $order){
        $products = $order->products;

        $amount = 0; 
        foreach($products as $product){
          $amount += $product->price * $product->pivot->quantity;
        }
        $order['amount'] = $amount;

        //Items count
        $items_count = 0;
        foreach($order->products as $product){
          $items_count += $product->pivot->quantity;
        }
        $order['items_count'] = $items_count;
      }
      
      return response()->json(['data' => $orders]);
    }

    //Auth User Orders
    public function userOrders(){
      //Searching for whole user orders
      $orders = Auth::user()->orders;
      foreach($orders as $order){
        $products = $order->products;
        $order['products'] = $products;

        //Amount count
        $amount = 0; 
        foreach($products as $product){
          $amount += $product->price * $product->pivot->quantity;
        }
        $order['amount'] = $amount;

      }
      
    
      //Conditional response
      if(is_null($orders)){
        return response()->json(['message' => 'User has not orders yet.']);
      }
      //Final response
      return response()->json(['data' => $orders]);
    }
    
    //Display a specific user order
    public function show(Order $order){
      //Check if order exists
      if(is_null($order)){
        return response()->json(['message' => 'Order does not exist']);
      }
      //Searching for a specific order -> list of products
      $products = $order->products;
      
      return response()->json(['data' => $products ]);
    }

    //Create an order
    public function create(Request $req){
      //Requests validation
      $validator = Validator::make($req->all(), [
        'cart' => 'array|required',
      ]);
      // //Check validation
      if($validator->fails()){
        return response()->json(["message" => $validator->errors()]);
      }
      // Here will be processed the payment than if the response it's OK a new order will be created
      //Creating a new Order
      $order = Order::create(['user_id' => Auth::user()->id]);
      //Storing cart products in the order
      foreach($req->cart as $item){
        OrderProduct::create([
          'order_id' => $order->id,
          'product_id' => $item['product_id'],
          'quantity' => $item['quantity']
        ]);
        //Updating the product stock quantity
        $product = Product::find($item['product_id']);
        $product->update(['stock' =>  $product->stock - $item['quantity']]);
      }
      $amount = 0;
      foreach($order->products as $product){
        $amount += $product->price * $product->pivot->quantity;
      }
      $items_count = 0;
      foreach($order->products as $product){
        $items_count += $product->pivot->quantity;
      }
      //Response
      return response()->json([
        'message' => 'Order placed.',
        'items_count' => $items_count,
        'total_amount' => $amount
      ]);
    }

    //Delete an Order
    public function destroy(Order $order){
      //Check if order exists
      if(is_null($order)){
        return response()->json(['message' => 'Order does not exist']);
      }
      //Delete order
      $order->delete();
      //Response
      return response()->json(['message' => 'Order was successfully deleted']);
    }
}
