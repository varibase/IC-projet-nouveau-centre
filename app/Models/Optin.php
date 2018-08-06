<?php

namespace App\Models;

class Optin extends Model
{
    protected $table = 'optins';
    protected $primaryKey = 'optin_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
