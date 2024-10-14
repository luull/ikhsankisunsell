<?php
namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ListTransactionController extends Controller
{
    public function showTransactions()
    {
        $userData = session('user_data');
        if ($userData->role !== 'admin') {
            return redirect()->route('beranda')->with('error', 'You do not have access to this page.');
        }
        $transactions = Transaction::with('user')->get();
        return view('admin.transaction', compact('transactions'));
    }
    public function approveTransaction($id)
    {
        $transaction = Transaction::findOrFail($id);
        
        if (!$transaction->transfer_proof) {
            return back()->with('message', 'Transfer proof is required.')->with('alert-type', 'danger');
        }
    
        $username = 'duyofoDlY3aW';
        $apiKey = 'dev-674f7040-c9fa-11ed-8da8-87a420062dfb';
        $refId = $transaction->ref_id;
        $noHp = $transaction->no_hp;
    
        $sign = md5($username . $apiKey . $refId);
    
        $response = Http::post('https://api.digiflazz.com/v1/transaction', [
            'commands' => 'pay-pasca',
            'username' => $username,
            'buyer_sku_code' => 'hp',
            'customer_no' => $noHp,
            'ref_id' => $refId,
            'sign' => $sign,
            'testing' => true,
        ]);
    
        $responseData = $response->json();
    
        if (isset($responseData['data']['rc']) && $responseData['data']['rc'] === '00') {
            $transaction->status = 'approved';
            $transaction->save();
    
            return back()->with('message', 'Transaction approved successfully.')->with('alert-type', 'success');
        } else {
            $errorMessage = $responseData['message'] ?? $responseData['error'] ?? 'Unknown error occurred';
            return back()->with('message', $errorMessage)->with('alert-type', 'danger');
        }
    }
    
public function rejectTransaction($id)
{
    $transaction = Transaction::findOrFail($id);
    if ($transaction->status === 'pending') {
        $transaction->status = 'rejected';
        $transaction->save();
    }

    return redirect()->back()->with('success', 'Transaction rejected successfully.');
}

}