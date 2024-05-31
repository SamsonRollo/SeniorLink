<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $fillable = ['name', 'administrator', 'town_id', 'email', 'password', 'official_seal'];

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function seniors()
    {
        return $this->hasMany(Senior::class);
    }
}
