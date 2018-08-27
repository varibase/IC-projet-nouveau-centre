<?php

namespace App\Models;

class Card extends Model
{
    protected $table = 'cards';
    protected $primaryKey = 'card_id';

    protected $dateFormat = 'Y-d-m H:i:s.000';

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
        /*
        $card = Card::where([
            ['user_id', '=', null],
            ['type_id', '=', '1']
        ])->first();

        $card->user_id = $user_id;
        $card->save();
*/
        $card = Card::create([
            'user_id' => $user_id,
            'type_id' => '1'
        ]);

        return $card;
    }
}
