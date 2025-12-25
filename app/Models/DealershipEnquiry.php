<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealershipEnquiry extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'business_name',
        'business_address',
        'city',
        'state',
        'pin_code',
        'type_of_business',
        'approx_daily_requirement',
        'additional_notes',
        'agree_terms',
        'message',
    ];

    protected $casts = [
        'agree_terms' => 'boolean',
    ];
}
