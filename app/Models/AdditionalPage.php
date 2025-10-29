<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalPage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'meta_title', 'meta_keywords', 'meta_description', 'description', 'scripts', 'image', 'status'];
}
