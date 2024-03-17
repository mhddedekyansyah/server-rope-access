<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request){
        try {
        //    return $request->all();
            $cartIsExist =  Cart::where('product_id', $request->input('product_id'))->where('user_id', Auth::user()->id)->first();

            
            // return \response()->json(['data' => !isset($cartIsExist)]);
            if(isset($cartIsExist)){
                Cart::where('product_id', $request->input('product_id'))
                        ->where('user_id', Auth::user()->id)->update([ 
                "product_id" => $request->input('product_id'), 
                "user_id" =>  Auth::user()->id,
                "quantity" => $cartIsExist->quantity + 1,
            ]);

            $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->input('product_id'))->with(['product'])->first();

           
            // return response()->json(['data' => $cart->load('product')], 200);
            return \response()->json(['data' => true], 200);
            // return 'success';
            }else{
               $cart = Cart::create([
                "product_id" => $request->input('product_id'), 
                "user_id" =>  Auth::user()->id,
                "quantity" => $request->quantity,
            ]);

            // return \response()->json(['data' => $cart->load('product')], 200);
            return \response()->json(['data' => true], 200);
            // return 'success created';
            }
               
            // return \response()->json(['data' => $newCart->load()]);
            


        } catch (\Exception $err) {
            return response()->json(['message' => $err, 'status' => false], 400);
        }
    }

    public function cart(Request $request){
        try {
            
            $carts = Cart::where('user_id', Auth::user()->id)->with(['product'])->get();
            return response()->json(['data' => $carts]);
        } catch (\Exception $err) {
            return response()->json(['message' => $err], 401);
        }
    }

    public function destroyCart(Request $request){
        if($request->id){
            try {
                
                Cart::where('user_id', Auth::user()->id)->find($request->id)->delete();
                return \response()->json(['data'=> true], 200);
            } catch (\Exception $err) {
                //throw $th;
                 return response()->json(['message'=> $err, 'data' => false], 401);
            }
        }
    }
    public function incrementQuantity(Request $request){
        if($request->id){
            try {
                
                $cart = Cart::where('user_id', Auth::user()->id)->find($request->id);

                $cart->update(
                    [
                        'product_id' => $request->product_id,
                        'user_id' => $request->user_id,
                        'quantity' => $cart->quantity + $request->quantity,
                    ]
                );
                return \response()->json(['data'=> true], 200);
            } catch (\Exception $err) {
                //throw $th;
                 return response()->json(['message'=> $err, 'data' => false], 400);
            }
        }
    }
    public function decrementQuantity(Request $request){
        if($request->id){
            try {
                
                $cart = Cart::where('user_id', Auth::user()->id)->find($request->id);

                $cart->update(
                    [
                        'product_id' => $request->product_id,
                        'user_id' => $request->user_id,
                        'quantity' => $cart->quantity - $request->quantity,
                    ]
                );
                return \response()->json(['data'=> true], 200);
            } catch (\Exception $err) {
                //throw $th;
                 return response()->json(['message'=> $err, 'data' => false], 401);
            }
        }
    }


}
