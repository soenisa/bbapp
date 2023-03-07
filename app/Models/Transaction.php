<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

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
        'account',
        'amount',
        'created_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'transaction_category');
    }

    public function meta() : HasMany
    {
        return $this->hasMany(TransactionMeta::class);
    }

    public static function createEntry($attributes = [])
    {
        // if name matches a category, use it
        $categories = array_map(function ($value) { return strtolower($value); }, Category::CATEGORIES);
        
        if (in_array(strtolower($attributes['name']), $categories)) {
            $attributes['category'] = ucwords($attributes['name']);
        } if (Str::contains(strtolower($attributes['name']), ['interac', 'etransfer', 'e-transfer'], true)) {
            $attributes['category'] = Category::CATEGORY_ETRANSFER;
        }
        
        return self::create($attributes);
    }
}
