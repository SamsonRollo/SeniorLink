<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $fillable = ['name', 'code', 'email', 'bir_id', 'owner_name', 'owner_tin', 'establishment_type_id', 'address', 'password', 'logo'];

    public function establishmentType()
    {
        return $this->belongsTo(EstablishmentType::class);
    }

    public function tellers()
    {
        return $this->hasMany(Teller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
