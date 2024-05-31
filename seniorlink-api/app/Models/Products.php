<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name', 'quantity', 'price'];
    protected $table = 'products';

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }
}
