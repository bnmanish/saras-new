<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'title',
        'url',
        'target',
        'status',
    ];

    public function section()
    {
        return $this->belongsTo(FooterSection::class, 'section_id');
    }
}