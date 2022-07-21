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

    public const CATEGORIES = [
        Category::CATEGORY_RENT,
        Category::CATEGORY_INTERNET,
        Category::CATEGORY_PAPA_SUPPORT,
        Category::CATEGORY_PHONE,
        Category::CATEGORY_BANK_FEES,
        Category::CATEGORY_INCOME,
        Category::CATEGORY_ETRANSFER,
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
