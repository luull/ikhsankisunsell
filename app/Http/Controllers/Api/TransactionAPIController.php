<?php

namespace App\Http\Controllers\Api;

use App\Models\Products;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TransactionAPIController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json($transactions, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|exists:users,name',
            'product_code' => 'required|exists:products,kode_produk', 
            'no_hp' => 'required|string|max:15',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $product = Products::where('kode_produk', $request->product_code)->first();
        $ref_id = Str::uuid();
        $user = User::where('name', $request->username)->first();
    
        $transaction = Transaction::create([
            'ref_id' => $ref_id,
            'user_id' => $user->id,
            'product_code' => $product->kode_produk, 
            'provider' => $product->provider,
            'produk' => $product->product_name,
            'no_hp' => $request->no_hp,
            'amount' => $product->harga,
            'status' => 'pending',
            'payment_reference' => null, 
        ]);
    
        return response()->json($transaction, 201);
    }
    

    public function show($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        return response()->json($transaction, 200);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
    
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'product_code' => 'sometimes|exists:products,kode_produk',
            'no_hp' => 'sometimes|string|max:15',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        if ($request->has('product_code')) {
            $product = Products::where('kode_produk', $request->product_code)->first();
            $transaction->product_code = $product->kode_produk;
            $transaction->provider = $product->provider;
            $transaction->produk = $product->produk;
            $transaction->amount = $product->harga;
        }
    
        if ($request->has('no_hp')) {
            $transaction->no_hp = $request->no_hp;
        }
    
        $transaction->save();
    
        return response()->json($transaction, 200);
    }
    
    
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->delete();
        return response()->json(['message' => 'Transaction deleted successfully'], 200);
    }
}
