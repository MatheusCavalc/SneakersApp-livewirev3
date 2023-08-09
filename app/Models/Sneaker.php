<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'published',
        'brand_id',
        'image',
        'slug',
        'name',
        'price',
        'promotion_price',
        'in_promotion',
        'color',
        'sizes',
    ];

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published' => 'boolean',
        'in_promotion' => 'boolean',
        'sizes' => 'array',
    ];
}
