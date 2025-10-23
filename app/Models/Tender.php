<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable = [
        'title',
        'publish_date',
        'file',
        'status',
    ];
}
