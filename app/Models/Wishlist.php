<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'wishlist_owner',
        'sneaker_id'
    ];

    public function sneaker()
    {
        return $this->hasOne(Sneaker::class, 'id', 'sneaker_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'wishlist_owner');
    }
}
