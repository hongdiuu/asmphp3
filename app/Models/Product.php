<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = [
        'id',
        'name',
        'image',
        'price',
        'description',
        'category_id',
    ];

    public function images(){
        return $this->hasMany(ProductImage::class , 'product_id');
    }

    // belongs to la thuoc ve 
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
}
