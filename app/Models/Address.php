<?php

namespace App\Models;


class Address extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'address_id';

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'address_id', 'address_id');
    }
}
