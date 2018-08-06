<?php

namespace App\Models;

class Card extends Model
{
    protected $table = 'cards';
    protected $primaryKey = 'card_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function type()
    {
        return $this->hasOne(CardType::class, 'type_id', 'type_id');
    }

    public static function assignNewDigital($user_id)
    {
        $card = Card::where([
            ['user_id', '=', null],
            ['type_id', '=', '1']
        ])->first();

        $card->user_id = $user_id;
        $card->save();

        return $card;
    }
}
