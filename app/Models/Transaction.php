<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'transaction_category');
    }

    public static function createEntry($attributes = []) {
        // if name matches a category, use it
        if (in_array($attributes['name'], [
            Category::CATEGORY_RENT,
            Category::CATEGORY_INTERNET,
            Category::CATEGORY_PAPA_SUPPORT,
            Category::CATEGORY_PHONE,
            Category::CATEGORY_BANK_FEES,
            Category::CATEGORY_INCOME,
        ])) {
            $attributes['category'] = $attributes['name'];
        }

        return self::create($attributes);
    }
}
