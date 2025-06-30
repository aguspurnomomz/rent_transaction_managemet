<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $casts = [
        'date_paid' => 'date:Y-m-d', // This will automatically cast to Carbon instance
    ];
}