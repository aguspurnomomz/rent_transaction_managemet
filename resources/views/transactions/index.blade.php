@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Transaction List</h1>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add Transaction</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Code</th>
                    <th>Category</th>
                    <th>Transaction Name</th>
                    <th>Amount (IDR)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->date_paid->format('d/m/Y') }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->code }}</td>
                    <td>
                        <span class="badge bg-{{ $transaction->category == 'income' ? 'success' : 'danger' }}">
                            {{ ucfirst($transaction->category) }}
                        </span>
                    </td>
                    <td>{{ $transaction->transaction_name }}</td>
                    <td>Rp {{ number_format($transaction->nominal_idr, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="d-flex justify-content-between align-items-center">
            <div>Showing {{ $transactions->firstItem() }} to {{ $transactions->lastItem() }} of {{ $transactions->total() }} entries</div>
            {{ $transactions->links() }}
        </div>
    </div>
</div>
@endsection