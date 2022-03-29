<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const CATEGORY_RENT = 'Rent';
    const CATEGORY_INTERNET = 'Internet';
    const CATEGORY_PAPA_SUPPORT = 'Papa Support';
    const CATEGORY_PHONE = 'Phone';
    const CATEGORY_BANK_FEES = 'Bank Fees';
    const CATEGORY_INCOME = 'Income';
}
