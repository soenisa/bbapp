<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionMeta extends Model
{
    use HasFactory;

    protected $table = 'transactions_meta';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'value',
    ];

    public function transaction() : BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'transaction_id','id');
    }
}
