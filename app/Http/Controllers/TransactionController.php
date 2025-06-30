<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate(15);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'rate_euro' => 'nullable|numeric',
            'date_paid' => 'required|date',
            'category' => 'required|in:income,expense',
            'transaction_name' => 'required|string|max:255',
            'nominal_idr' => 'required|numeric',
        ]);

        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully!');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'rate_euro' => 'nullable|numeric',
            'date_paid' => 'required|date',
            'category' => 'required|in:income,expense',
            'transaction_name' => 'required|string|max:255',
            'nominal_idr' => 'required|numeric',
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }
    
public function dashboard()
{
    $totalIncome = Transaction::where('category', 'income')->sum('nominal_idr');
    $totalExpense = Transaction::where('category', 'expense')->sum('nominal_idr');
    $netBalance = $totalIncome - $totalExpense;
    
    $recentTransactions = Transaction::latest('date_paid')->take(5)->get();
    
    return view('dashboard', compact('totalIncome', 'totalExpense', 'netBalance', 'recentTransactions'));
}
}