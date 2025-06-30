<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $transactions = [
            [
                'description' => 'Transaksi Bulan Agustus',
                'code' => '123456',
                'rate_euro' => 15000,
                'date_paid' => '2018-08-11',
                'category' => 'income',
                'transaction_name' => 'Rental Mobil bulan agustus',
                'nominal_idr' => 800000,
            ],
            [
                'description' => 'Transaksi Bulan Agustus',
                'code' => '123456',
                'rate_euro' => 15000,
                'date_paid' => '2018-08-11',
                'category' => 'income',
                'transaction_name' => 'Bensin',
                'nominal_idr' => 150000,
            ],
            [
                'description' => 'Transaksi Bulan Agustus',
                'code' => '123456',
                'rate_euro' => 15000,
                'date_paid' => '2018-08-11',
                'category' => 'expense',
                'transaction_name' => 'Bayar sopir',
                'nominal_idr' => 300000,
            ],
            [
                'description' => 'Transaksi Minggu ke2',
                'code' => '7890',
                'rate_euro' => 16000,
                'date_paid' => '2018-08-19',
                'category' => 'income',
                'transaction_name' => 'Rental Mobil bulan agustus minggu ke2',
                'nominal_idr' => 900000,
            ],
            [
                'description' => 'Transaksi Minggu ke2',
                'code' => '7890',
                'rate_euro' => 16000,
                'date_paid' => '2018-08-19',
                'category' => 'expense',
                'transaction_name' => 'Rental Mobil bulan Agustus minggu ke3',
                'nominal_idr' => 900000,
            ],
            [
                'description' => 'Transaksi Minggu ke2',
                'code' => '7890',
                'rate_euro' => 16000,
                'date_paid' => '2018-08-19',
                'category' => 'expense',
                'transaction_name' => 'bayar sopir',
                'nominal_idr' => 300000,
            ],
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}