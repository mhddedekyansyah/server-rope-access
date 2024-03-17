<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction as ModelsTransaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class TransactionController extends Controller
{
    public function getTransactionByUser(){
        $transactions = ModelsTransaction::with('items.product')->where('users_id', Auth::user()->id)->get();

        return \response()->json(['data' => $transactions]);
    }

    public function checkout(Request $request)
    {
       try {

        DB::beginTransaction();
         $transaction = ModelsTransaction::create([
            'users_id' => Auth::user()->id,
            'address' => $request->address,
            'total_price' => $request->total_price,
            'status' => $request->status
        ]);

        foreach ($request->items as $item) {
            TransactionItem::create([
                'users_id' => Auth::user()->id,
                'products_id' => $item['id'],
                'transactions_id' => $transaction->id,
                'quantity' => $item['quantity']
            ]);
        
            Product::where('id',  $item['id'])->decrement('stok', $item['quantity']);
            
        }
        Cart::where('user_id', Auth::user()->id)->delete();

        DB::commit();
        $transactions = ModelsTransaction::with(['items.product'])->where('users_id', Auth::user()->id)->get();
        return response()->json(['data' => $transaction->load('items.product')]);
        // return response()->json(['data' => $transactions]);
       } catch (\Exception $err) {
        DB::rollBack();
        return \response()->json(['message' => $err->getMessage()]);
       }
    }
}

