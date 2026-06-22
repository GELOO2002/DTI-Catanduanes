<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    // Allows us to seed data freely
    protected $guarded = [];

    // 🔄 Link business to its multiple products
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}