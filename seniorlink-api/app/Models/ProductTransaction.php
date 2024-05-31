<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    protected $fillable = ['products_id', 'transaction_id'];

    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
