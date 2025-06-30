<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', [TransactionController::class, 'dashboard'])->name('dashboard');
Route::resource('transactions', TransactionController::class);