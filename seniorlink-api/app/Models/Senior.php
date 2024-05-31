<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Senior extends Model
{
    protected $fillable = ['osca_id', 'fname', 'mname', 'lname', 'barangay_id', 'birthdate', 'contact_number', 'username', 'profile_image', 'qr_image'];

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
