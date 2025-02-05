<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_image';
    protected $fillable = [
        'id',
        'product_id',
        'image_url',
        'image_type',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id' , 'id');
    }
}
