@extends('partials.app')

@section('title', 'Product')

@section('content')
<div>
    <h1>Transaction List</h1>
    @if (session('message'))
    <div class="alert alert-{{ session('alert-type', 'info') }}">
        {{ session('message') }}
    </div>
@endif

<div class="table-responsive">
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Ref ID</th>
            <th>User</th>
            <th >Product</th>
            <th>Provider</th>
            <th>No HP</th>
            <th class="w-50">Amount</th>
            <th>Status</th>
            <th>Transfer Proof</th>
            <th>Created At</th>
            <th class="w-75">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i = 1;
        ?>
        @foreach($transactions as $transaction)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $transaction->ref_id }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ $transaction->product->product_name }}</td>
                <td>{{ $transaction->provider }}</td>
                <td>{{ $transaction->no_hp }}</td>
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
                        <a href="{{ asset('storage/' . $transaction->transfer_proof) }}" class="btn btn-sm btn-outline-info" target="_blank"> <i class="fa fa-eye"></i>View proof</a>
                    @else
                        <span class="badge badge-secondary">No Proof</span>
                    @endif
                </td>
                <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                <td>
                    @if($transaction->status === 'pending')
                        <!-- Approve Icon Box (Disabled if no transfer_proof) -->
                        <form action="{{ route('admin.approveTransaction', $transaction->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to approve this transaction?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-outline-success" title="Approve" 
                                @if(!$transaction->transfer_proof) disabled @endif>
                                <i class="fa fa-check"></i>
                            </button>
                        </form>

                        <!-- Reject Icon Box -->
                        <form action="{{ route('admin.rejectTransaction', $transaction->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to reject this transaction?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Reject">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    @else

                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>




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