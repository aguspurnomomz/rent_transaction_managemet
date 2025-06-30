@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Total Income</h5>
                <p class="card-text">Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5 class="card-title">Total Expense</h5>
                <p class="card-text">Rp {{ number_format($totalExpense, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Net Balance</h5>
                <p class="card-text">Rp {{ number_format($netBalance, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Recent Transactions</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Amount (IDR)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentTransactions as $transaction)
                <tr>
                    <td>{{ $transaction->date_paid->format('d M Y') }}</td>
                    <td>{{ $transaction->transaction_name }}</td>
                    <td>
                        <span class="badge bg-{{ $transaction->category == 'income' ? 'success' : 'danger' }}">
                            {{ ucfirst($transaction->category) }}
                        </span>
                    </td>
                    <td>Rp {{ number_format($transaction->nominal_idr, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection