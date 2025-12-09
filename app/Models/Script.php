<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Script extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'content',
        'description',
        'status',
        'page_id'
    ];
    
    protected $casts = [
        'content' => 'array',
        'status' => 'boolean',
    ];
    
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    
    public function scopeForPage($query, $pageId)
    {
        return $query->where('page_id', $pageId);
    }
}