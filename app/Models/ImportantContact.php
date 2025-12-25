<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportantContact extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'landline',
        'mobile_number',
        'status',
    ];
}
