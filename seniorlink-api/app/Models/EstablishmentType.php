<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstablishmentType extends Model
{
    protected $fillable = ['type'];
    protected $table = 'establishment_type';

    public function establishments()
    {
        return $this->hasMany(Establishment::class);
    }
}