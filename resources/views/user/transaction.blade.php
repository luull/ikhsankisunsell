@extends('partials.app')

@section('title', 'My Transaction')

@section('content')
    <div>
        <h1 class="text-center mb-4">My Transactions</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Transfer Proof</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->product->product_name }}</td>
                <td>@currency($transaction->amount)</td>
                <td>
                    @if($transaction->status === 'pending')
                        <span class="badge badge-warning">Pending</span>
                    @elseif($transaction->status === 'approved')
                        <span class="badge badge-success">Approved</span>
                    @elseif($transaction->status === 'rejected')
                        <span class="badge badge-danger">Rejected</span>
                    @else
                        <span class="badge badge-secondary">{{ ucfirst($transaction->status) }}</span>
                    @endif
                </td>
                <td>
                    @if($transaction->transfer_proof)
                        <a href="{{ asset('storage/' . $transaction->transfer_proof) }}" target="_blank" class="btn btn-sm btn-outline-info">View Proof</a>
                    @else
                        <span class="badge badge-secondary">No Proof</span>
                    @endif
                </td>
                <td>
                    @if($transaction->status === 'pending')
                        @if(!$transaction->transfer_proof)
                            <form action="{{ route('user.uploadTransferProof', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file mb-2">
                                    <input type="file" name="transfer_proof" class="custom-file-input" id="customFile{{ $transaction->id }}" required>
                                    <label class="custom-file-label" for="customFile{{ $transaction->id }}">Choose file</label>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary btn-block">Upload Proof</button>
                            </form>
                        @else
                            <span class="badge badge-info">Proof Uploaded</span>
                        @endif
                    @elseif($transaction->status === 'approved')
                        <span class="badge badge-success">Payment Approved</span>
                    @elseif($transaction->status === 'rejected')
                        <span class="badge badge-danger">Payment Rejected</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No transactions found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<script>

    document.querySelectorAll('.custom-file-input').forEach(input => {
        input.addEventListener('change', function(e){
            var fileName = e.target.files[0].name;
            var label = e.target.nextElementSibling;
            label.innerText = fileName;
        });
    });
</script>

    </div>
@endsection
