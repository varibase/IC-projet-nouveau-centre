<?php

namespace App\Models;

class CardType extends Model
{
    protected $table = 'card_types';
    protected $primaryKey = 'type_id';

    public function cards()
    {
        return $this->hasMany(Card::class, 'type_id', 'type_id');
    }
}
