<?php

namespace App\Models;

class Offer extends Model
{
    protected $table = 'offers';
    protected $primaryKey = 'offer_id';

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'partner_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'group_id');
    }

    public function info()
    {
        return $this->hasMany(OfferInfo::class, 'offer_id', 'offer_id');
    }

    public function getRouteKeyName()
    {
        return 'offer_id';
    }

    public function getLangInfo($lang)
    {
        $info = $this->info->where('lang', $lang);
        if($info)
        {
            return $info->first();
        }
        else
        {
            $offerInfo = new OfferInfo();
            $offerInfo->offer_id = $this->offer_id;
            $offerInfo->save();
            return $offerInfo;
        }

    }

}
