@if($transaction->status == 'pending')
    <p>Your transaction is pending. Please complete the payment.</p>
@elseif($transaction->status == 'paid')
    <p>Your payment is being processed. Thank you!</p>
@elseif($transaction->status == 'completed')
    <p>Your transaction has been completed. Thank you for your purchase!</p>
@endif
