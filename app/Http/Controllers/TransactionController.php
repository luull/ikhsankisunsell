<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller {

    // Form input transaksi
    public function create() {
        return view('transaction.create');
    }

    // Simpan transaksi ke database dengan status 'pending'
    public function store(Request $request) {
        $validated = $request->validate([
            'produk' => 'required',
            'provider' => 'required',
            'no_hp' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'produk' => $validated['produk'],
            'provider' => $validated['provider'],
            'no_hp' => $validated['no_hp'],
            'amount' => $validated['amount'],
            'status' => 'pending'
        ]);

        // Kirim info pembayaran (misal transfer ke bank)
        return view('transaction.payment-info', compact('transaction'));
    }

    // Verifikasi manual pembayaran
    public function verifyPayment(Request $request) {
        $validated = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'payment_reference' => 'required'
        ]);

        $transaction = Transaction::find($validated['transaction_id']);
        $transaction->update([
            'payment_reference' => $validated['payment_reference'],
            'status' => 'paid'
        ]);

        // Tampilkan halaman transaksi sedang diproses
        return redirect()->route('transaction.status', ['id' => $transaction->id]);
    }

    // Tampilkan status transaksi (Pending -> Paid -> Completed)
    public function showStatus($id) {
        $transaction = Transaction::findOrFail($id);
        return view('transaction.status', compact('transaction'));
    }
}
