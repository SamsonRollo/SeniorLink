<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = ['name', 'administrator', 'email', 'zip_code', 'password', 'official_seal'];

    public function barangays()
    {
        return $this->hasMany(Barangay::class);
    }
}