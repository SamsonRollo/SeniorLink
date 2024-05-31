<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teller extends Model
{
    protected $fillable = ['name', 'birthdate', 'address', 'tin', 'establishment_id', 'profile_image'];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
