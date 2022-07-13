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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category',
        'amount',
        'created_at',
    ];

    public static function createEntry($attributes = []) {
        // if name matches a category, use it
        if (in_array($attributes['name'], [
            static::CATEGORY_RENT,
            static::CATEGORY_INTERNET,
            static::CATEGORY_PAPA_SUPPORT,
            static::CATEGORY_PHONE,
            static::CATEGORY_BANK_FEES,
            static::CATEGORY_INCOME,
        ])) {
            $attributes['category'] = $attributes['name'];
        }

        return self::create($attributes);
    }
}
