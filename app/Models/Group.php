<?php

namespace App\Models;

class Group extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'group_id';

    public function locations()
    {
        return $this->hasMany(Location::class, 'group_id', 'group_id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'group_id','group_id');
    }
}
