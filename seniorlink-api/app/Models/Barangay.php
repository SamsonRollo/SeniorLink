<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $fillable = ['name', 'administrator', 'town_id', 'email', 'password', 'official_seal'];
    protected $table = 'barangay';

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function seniors()
    {
        return $this->hasMany(Senior::class);
    }
}
