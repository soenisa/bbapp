<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use App\Models\Transaction;

class Category extends Model
{
    use HasFactory;
    use Uuids;

    const CATEGORY_RENT = 'Rent';
    const CATEGORY_INTERNET = 'Internet';
    const CATEGORY_PAPA_SUPPORT = 'Papa Support';
    const CATEGORY_PHONE = 'Phone';
    const CATEGORY_BANK_FEES = 'Bank Fees';
    const CATEGORY_INCOME = 'Income';
    const CATEGORY_ETRANSFER = 'E-transfer';
    const CATEGORY_ATM_WITHDRAWAL = 'ATM Withdrawal';
    const CATEGORY_INSURANCE = 'Insurance';
    const CATEGORY_INVESTMENT = 'Investment';
    
public const CATEGORIES = [
        self::CATEGORY_RENT,
        self::CATEGORY_INTERNET,
        self::CATEGORY_PAPA_SUPPORT,
        self::CATEGORY_PHONE,
        self::CATEGORY_BANK_FEES,
        self::CATEGORY_INCOME,
        self::CATEGORY_ETRANSFER,
        self::CATEGORY_ATM_WITHDRAWAL,
        self::CATEGORY_INSURANCE,
        self::CATEGORY_INVESTMENT,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }
}
