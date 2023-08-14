<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand_id',
        'image',
        'description'
    ];

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function sneakers()
    {
        return $this->hasMany(Sneaker::class, 'collection_id', 'id');
    }
}
