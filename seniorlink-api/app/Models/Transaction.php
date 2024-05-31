<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['senior_id', 'establishment_id', 'date', 'teller_id'];

    public function senior()
    {
        return $this->belongsTo(Senior::class);
    }

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function teller()
    {
        return $this->belongsTo(Teller::class);
    }

    public function products()
    {
        return $this->belongsToMany(Products::class);
    }
}
