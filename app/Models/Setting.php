<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'primary_contact',
        'secondary_contact', 
        'primary_email',
        'secondary_email',
        'primary_address',
        'secondary_address',
        'copyrights',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'head_content',
        'site_logo',
        'site_logo2',
        'favicon'
    ];
}
