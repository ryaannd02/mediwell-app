<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Izinkan mass assignment untuk kolom ini
    protected $fillable = [
        'toko_user_id',
        'name',
        'price',
        'stock',
        'photo',
    ];

    public function toko()
    {
        return $this->belongsTo(User::class, 'toko_user_id');
    }

}