<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilkPurchasePriceChart extends Model
{
    use HasFactory;
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