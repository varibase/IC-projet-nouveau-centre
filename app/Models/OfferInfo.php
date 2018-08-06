<?php

namespace App\Models;

class OfferInfo extends Model
{
    protected $table = 'offer_infos';
    protected $primaryKey = 'info_id';

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'offer_id');
    }
}
