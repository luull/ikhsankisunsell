<p>Please transfer Rp{{ $transaction->amount }} to the following bank account:</p>
<ul>
    <li>Bank: BCA</li>
    <li>Account Number: 123-456-789</li>
    <li>Account Name: John Doe</li>
</ul>

<p>After the transfer, please submit your payment reference.</p>

<form action="{{ route('transaction.verify') }}" method="POST">
    @csrf
    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
    <label for="payment_reference">Payment Reference:</label>
    <input type="text" name="payment_reference" id="payment_reference">
    <button type="submit">Submit</button>
</form>
