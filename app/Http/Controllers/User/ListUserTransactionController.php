<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ListUserTransactionController extends Controller
{
    public function index()
    {   
        $userData = session('user_data');
        $transactions = Transaction::with('product') 
        ->where('user_id', $userData->id)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('user.transaction', compact('transactions'));
    }

    public function uploadTransferProof(Request $request, $id)
    {
        $userData = session('user_data');
        $request->validate([
            'transfer_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $transaction = Transaction::where('user_id',  $userData->id)->findOrFail($id);

        $path = $request->file('transfer_proof')->store('transfer_proofs', 'public');

        $transaction->update([
            'transfer_proof' => $path,
        ]);

        return redirect()->route('user.transactions')->with('success', 'Transfer proof uploaded successfully.');
    }
}
