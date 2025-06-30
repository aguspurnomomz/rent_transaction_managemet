@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>{{ isset($transaction) ? 'Edit' : 'Add' }} Transaction</h2>
    </div>
    <div class="card-body">
        <form action="{{ isset($transaction) ? route('transactions.update', $transaction->id) : route('transactions.store') }}" method="POST">
            @csrf
            @if(isset($transaction))
                @method('PUT')
            @endif
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" 
                           value="{{ old('description', $transaction->description ?? '') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" class="form-control" id="code" name="code" 
                           value="{{ old('code', $transaction->code ?? '') }}" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="rate_euro" class="form-label">Rate Euro</label>
                    <input type="number" step="0.001" class="form-control" id="rate_euro" name="rate_euro" 
                           value="{{ old('rate_euro', $transaction->rate_euro ?? '') }}">
                </div>
                <div class="col-md-4">
                    <label for="date_paid" class="form-label">Date Paid</label>
                    <input type="date" class="form-control" id="date_paid" name="date_paid" 
                           value="{{ old('date_paid', isset($transaction) ? $transaction->date_paid->format('Y-m-d') : '') }}" required>
                </div>
                <div class="col-md-4">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="income" {{ old('category', $transaction->category ?? '') == 'income' ? 'selected' : '' }}>Income</option>
                        <option value="expense" {{ old('category', $transaction->category ?? '') == 'expense' ? 'selected' : '' }}>Expense</option>
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="transaction_name" class="form-label">Transaction Name</label>
                    <input type="text" class="form-control" id="transaction_name" name="transaction_name" 
                           value="{{ old('transaction_name', $transaction->transaction_name ?? '') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="nominal_idr" class="form-label">Nominal (IDR)</label>
                    <input type="number" class="form-control" id="nominal_idr" name="nominal_idr" 
                           value="{{ old('nominal_idr', $transaction->nominal_idr ?? '') }}" required>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection