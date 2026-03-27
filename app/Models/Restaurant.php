<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'location',
        'description',
        'food_type',
        'tags',
        'image',
        'rating',
        'delivery_minutes',
        'delivery_fee',
    ];

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getFormattedDeliveryFeeAttribute(): string
    {
        return $this->delivery_fee ? '€'.number_format($this->delivery_fee / 100, 2) : 'Free';
    }
}
