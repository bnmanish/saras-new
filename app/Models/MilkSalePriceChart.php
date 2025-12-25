<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MilkSalePriceChart extends Model
{
    protected $fillable = [
        'title',
        'publish_date',
        'file',
        'status',
    ];

    protected $casts = [
        'publish_date' => 'date',
    ];
}