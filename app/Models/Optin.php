<?php

namespace App\Models;

class Optin extends Model
{
    protected $table = 'optins';
    protected $primaryKey = 'optin_id';

    protected $dateFormat = 'Y-d-m H:i:s.000';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
