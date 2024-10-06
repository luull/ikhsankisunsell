<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatbotController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Ambil data dari request Dialogflow
        $data = $request->all();

        // Ekstrak parameter dari intent
        $phoneNumber = $data['queryResult']['parameters']['phone-number'];
        $provider = $data['queryResult']['parameters']['provider'];
        $amount = $data['queryResult']['parameters']['amount'];

        // Simpan transaksi ke database dengan status 'pending'
        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'produk' => 'pulsa','paket internet',
            'provider' => $provider,
            'no_hp' => $phoneNumber,
            'amount' => $amount,
            'status' => 'pending'
        ]);

        // Respon yang diberikan kembali ke Dialogflow
        $responseMessage = "Transaksi Anda sedang diproses. Silakan transfer Rp" . $amount .
            " ke rekening BCA 123-456-789 a.n. John Doe. Lalu kirimkan bukti pembayaran.";

        // Kirimkan respon ke Dialogflow
        return response()->json([
            'fulfillmentText' => $responseMessage,
        ]);
    }
}
