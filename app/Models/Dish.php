<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'category',
        'ingredients',
        'allergies',
        'price',
    ];

    public function formattedPrice(): string
    {
        return '€'.number_format($this->price / 100, 2);
    }
}
