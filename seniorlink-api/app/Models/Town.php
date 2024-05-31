<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = ['name', 'administrator', 'email', 'zip_code', 'password', 'official_seal'];
    protected $table = 'town';

    public function barangays()
    {
        return $this->hasMany(Barangay::class);
    }
}