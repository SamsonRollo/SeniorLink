<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstablishmentType extends Model
{
    protected $fillable = ['type'];

    public function establishments()
    {
        return $this->hasMany(Establishment::class);
    }
}