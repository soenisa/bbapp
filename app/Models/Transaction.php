<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

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
        $categories = [
            Category::CATEGORY_RENT,
            Category::CATEGORY_INTERNET,
            Category::CATEGORY_PAPA_SUPPORT,
            Category::CATEGORY_PHONE,
            Category::CATEGORY_BANK_FEES,
            Category::CATEGORY_INCOME,
        ];
        $categories = array_map(function ($value) { return strtolower($value); }, $categories);
        if (in_array(strtolower($attributes['name']), $categories)) {
            $attributes['category'] = ucwords($attributes['name']);
        }

        return self::create($attributes);
    }
}
