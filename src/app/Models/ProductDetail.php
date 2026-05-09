<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'long_description',
        'manufacturer',
        'warranty_period',
    ];

    // この詳細情報が属する商品（1つ）
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
