<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'lang', 'location_id', 'confirmation_code', 'salutation'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'company_id', 'company_id');
    }

    public function phone()
    {
        return $this->hasOne(Phone::class, 'user_id', 'user_id');
    }

    public function card()
    {
        return $this->hasOne(Card::class, 'user_id', 'user_id');
    }

    public function optin()
    {
        return $this->hasOne(Optin::class, 'user_id', 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }

    public function newCard($type, $card_number = null)
    {
        if($type == 'digital')
        {
            if(!$this->card()->count())
            {
                $card = Card::assignNewDigital($this->user_id);
            }
            else
            {
                $card = $this->card;
            }
        }
        else if($type == 'physical')
        {
            if($this->card()->count())
            {
                $oldCard = $this->card;
                $oldCard->user_id = null;
                $oldCard->save();
            }
            $card = Card::where('card_number', '=', $card_number)->first();
            $card->user_id = $this->user_id;
            $card->save;
        }

        return $card;
    }

    public function confirmAndSetPassword($password)
    {
        $this->confirmed = 1;
        $this->confirmation_code = null;
        $this->password = Hash::make($password);
        if($this->optin->optin == 2 && $this->optin->optout == 0)
        {
            $this->optin->optin = 1;
            $this->optin->save();
        }
        $this->save();
    }
}
