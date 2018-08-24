<?php

namespace App\Models;


class Company extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'company_id';

    protected $dateFormat = 'd-m-y H:i:s';

    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'company_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }


}
