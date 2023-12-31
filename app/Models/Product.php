<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function order_detail(){
        return $this->hasMany(Order_detail::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function commentaries(){
        return $this->hasMany(Commentery::class);
    }
}
