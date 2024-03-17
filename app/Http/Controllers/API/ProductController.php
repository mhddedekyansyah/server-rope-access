<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        try {

            $products = Product::all();
            $respone = [
                'message' => 'Get All Data Product Success',
                'status_code' => 200,
                'data' => [
                    'products' => $products,
                ],
            ];

            return response()->json($respone);
        } catch (Exception $err) {
             $respone = [
                'message' => 'Get All Data Product Failed',
                'status_code' => 401,
            ];

            return response()->json($respone);
        }
    }
}
