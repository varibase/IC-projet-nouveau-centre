<?php

namespace App\Models;

class Location extends Model
{
    protected $table = 'locations';
    protected $primaryKey = 'location_id';

    public function getRouteKeyName()
    {
        return 'shortname';
    }

    public function companies()
    {
        return $this->hasMany(Company::class, 'location_id', 'location_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'location_id', 'location_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'group_id');
    }

    public function partners()
    {
        return $this->hasMany(Partner::class, 'location_id', 'location_id');
    }

    public function admins()
    {
        return $this->hasMany(Admin::class, 'location_id', 'location_id');
    }
}
