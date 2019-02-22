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

    public function getRouteKeyName()
    {
        return 'partner_id';
    }

    public static function getFromGroupId($group_id)
    {
        $group = Group::where('group_id', $group_id)->first();
        $locations = Location::where('group_id', $group->group_id)->get();
        $partners = Partner::whereIn('location_id', $locations->pluck('location_id'))->get();

        return $partners;
    }

    public function setAddress($data)
    {
        if($this->address)
        {
            $address = $this->address;
        }
        else
        {
            $address = Address::create();
        }

        $address->fill($data)->save();
        return $address;
    }
}
