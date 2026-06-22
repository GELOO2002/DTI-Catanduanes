<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    // Allows all fields to be safely inserted
   protected $fillable = [
    'business_id',
    'name',
    'description',
    'image',
    'gallery',
    'gallery_names',
    'gallery_descriptions',
    'history',
];

protected $casts = [
    'gallery'              => 'array',
    'gallery_names'        => 'array',
    'gallery_descriptions' => 'array',
];
    // 🔄 Link product back to its business owner
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}