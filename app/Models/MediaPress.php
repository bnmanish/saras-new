<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPress extends Model
{
    use HasFactory;

    protected $table = 'media_press';

    protected $fillable = ['title', 'short_description', 'pdf_or_link', 'date', 'image'];

    protected $casts = [
        'date' => 'date',
    ];
}