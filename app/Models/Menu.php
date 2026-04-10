<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'dishes';

    protected $fillable = [
        'restaurant_id',
        'name',
        'description',
        'image',
        'ingredients',
        'allergies',
        'price',
    ];
}
