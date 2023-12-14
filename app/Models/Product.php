<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function images(){

        return $this->hasOne(Image::class);
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand');
    }

    public function sizes(){

        return $this->hasMany(Size::class);
    }

    public function carts(){

        return $this->hasMany(Cart::class);
    }
    public function orders(){

        return $this->hasMany(Order::class);
    }
}
