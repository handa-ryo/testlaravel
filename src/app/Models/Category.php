<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // まだ設定していないため、Categoryにもfillableを設定
    protected $fillable = ['name'];

    // このカテゴリーに属する商品（複数）
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
