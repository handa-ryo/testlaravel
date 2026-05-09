<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // このタグが紐づく商品（複数）
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
