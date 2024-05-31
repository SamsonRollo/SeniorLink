<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name', 'quantity', 'price'];

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }
}