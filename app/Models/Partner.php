<?php

namespace App\Models;

class Partner extends Model
{
    protected $table = 'partners';
    protected $primaryKey = 'partner_id';

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'partner_id', 'partner_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'address_id', 'address_id');
    }
}
