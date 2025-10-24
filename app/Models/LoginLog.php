<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $fillable = ['user_id', 'username', 'ip_address', 'location', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
