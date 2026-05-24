<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'ノートPC', 'category_id' => 1, 'price' => 89800, 'stock' => 15, 'is_published' => true, 'description' => '高性能ノートパソコン'],
            ['name' => 'デスクトップPC', 'category_id' => 1, 'price' => 120000, 'stock' => 8, 'is_published' => true, 'description' => 'ゲーミングPC'],
            ['name' => 'マウス', 'category_id' => 1, 'price' => 2980, 'stock' => 50, 'is_published' => true, 'description' => 'ワイヤレスマウス'],
            ['name' => 'キーボード', 'category_id' => 1, 'price' => 8900, 'stock' => 30, 'is_published' => true, 'description' => 'メカニカルキーボード'],
            ['name' => 'モニター', 'category_id' => 1, 'price' => 34800, 'stock' => 12, 'is_published' => true, 'description' => '27インチ4Kモニター'],
            ['name' => 'Tシャツ', 'category_id' => 2, 'price' => 2900, 'stock' => 100, 'is_published' => true, 'description' => 'コットン100%'],
            ['name' => 'ジーンズ', 'category_id' => 2, 'price' => 5980, 'stock' => 45, 'is_published' => true, 'description' => 'デニムパンツ'],
            ['name' => 'スニーカー', 'category_id' => 2, 'price' => 7800, 'stock' => 20, 'is_published' => true, 'description' => 'ランニングシューズ'],
            ['name' => '大学ノート', 'category_id' => 3, 'price' => 180, 'stock' => 200, 'is_published' => true, 'description' => 'B5サイズ'],
            ['name' => 'ボールペン', 'category_id' => 3, 'price' => 120, 'stock' => 300, 'is_published' => true, 'description' => '黒・赤・青'],
            ['name' => 'クリアファイル', 'category_id' => 3, 'price' => 100, 'stock' => 150, 'is_published' => true, 'description' => 'A4サイズ'],
            ['name' => 'マグカップ', 'category_id' => 4, 'price' => 1200, 'stock' => 80, 'is_published' => true, 'description' => '陶器製'],
            ['name' => 'スマートウォッチ', 'category_id' => 1, 'price' => 45000, 'stock' => 0, 'is_published' => false, 'description' => '在庫切れ・非公開テスト用'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
