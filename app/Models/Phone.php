<?php

namespace App\Models;

class Phone extends Model
{
    protected $table = 'phones';
    protected $primaryKey = 'phone_id';

    protected $dateFormat = 'd-m-y H:i:s';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','user_id');
    }
}
