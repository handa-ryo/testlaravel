<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            // 家電カテゴリー (15件)
            ['name' => 'ノートPC', 'description' => '高性能ノートパソコン', 'price' => 89800, 'stock' => 15, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'デスクトップPC', 'description' => 'ゲーミングPC', 'price' => 120000, 'stock' => 8, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'マウス', 'description' => 'ワイヤレスマウス', 'price' => 2980, 'stock' => 50, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'キーボード', 'description' => 'メカニカルキーボード', 'price' => 8900, 'stock' => 30, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'モニター', 'description' => '27インチ4Kモニター', 'price' => 34800, 'stock' => 12, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'Webカメラ', 'description' => 'フルHD対応', 'price' => 6800, 'stock' => 25, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'ヘッドセット', 'description' => 'ノイズキャンセリング', 'price' => 12800, 'stock' => 18, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'プリンター', 'description' => 'カラーレーザー', 'price' => 28000, 'stock' => 10, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'スキャナー', 'description' => 'ドキュメント用', 'price' => 18000, 'stock' => 8, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => '外付けHDD', 'description' => '2TB', 'price' => 9800, 'stock' => 30, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'USBメモリ', 'description' => '64GB', 'price' => 1280, 'stock' => 100, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'スピーカー', 'description' => 'Bluetooth対応', 'price' => 5800, 'stock' => 20, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'ゲーミングチェア', 'description' => 'リクライニング機能', 'price' => 32000, 'stock' => 5, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'スマートウォッチ', 'description' => '在庫切れ・非公開テスト用', 'price' => 45000, 'stock' => 0, 'is_published' => false, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'タブレット', 'description' => 'ソフトデリートテスト用', 'price' => 58000, 'stock' => 5, 'is_published' => true, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => now()],

            // 食品カテゴリー (10件)
            ['name' => 'オーガニックコーヒー', 'description' => '香り高いコーヒー豆', 'price' => 1500, 'stock' => 30, 'is_published' => true, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => '緑茶', 'description' => '静岡産', 'price' => 980, 'stock' => 50, 'is_published' => true, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'はちみつ', 'description' => '国産100%', 'price' => 2800, 'stock' => 20, 'is_published' => true, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'オリーブオイル', 'description' => 'エキストラバージン', 'price' => 1680, 'stock' => 35, 'is_published' => true, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'パスタ', 'description' => 'デュラムセモリナ100%', 'price' => 380, 'stock' => 100, 'is_published' => true, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'トマトソース', 'description' => 'イタリア産', 'price' => 480, 'stock' => 60, 'is_published' => true, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'グラノーラ', 'description' => 'ナッツ&フルーツ', 'price' => 880, 'stock' => 40, 'is_published' => true, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'ジャム', 'description' => 'いちご', 'price' => 680, 'stock' => 45, 'is_published' => true, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'チョコレート', 'description' => 'ダークチョコ', 'price' => 580, 'stock' => 80, 'is_published' => true, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'マグカップ', 'description' => '陶器製', 'price' => 1200, 'stock' => 80, 'is_published' => true, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],

            // 衣類カテゴリー (10件)
            ['name' => 'Tシャツ', 'description' => 'コットン100%', 'price' => 2900, 'stock' => 100, 'is_published' => true, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'ジーンズ', 'description' => 'デニムパンツ', 'price' => 5980, 'stock' => 45, 'is_published' => true, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'スニーカー', 'description' => 'ランニングシューズ', 'price' => 7800, 'stock' => 20, 'is_published' => true, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'パーカー', 'description' => '裏起毛', 'price' => 4800, 'stock' => 60, 'is_published' => true, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'キャップ', 'description' => '調整可能', 'price' => 2400, 'stock' => 40, 'is_published' => true, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'ジャケット', 'description' => '防水加工', 'price' => 12800, 'stock' => 25, 'is_published' => true, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'マフラー', 'description' => 'ウール100%', 'price' => 3200, 'stock' => 35, 'is_published' => true, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => '手袋', 'description' => 'タッチパネル対応', 'price' => 1800, 'stock' => 50, 'is_published' => true, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'ベルト', 'description' => '本革', 'price' => 4200, 'stock' => 30, 'is_published' => true, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'ソックス', 'description' => '3足セット', 'price' => 980, 'stock' => 120, 'is_published' => true, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],

            // 書籍カテゴリー (10件)
            ['name' => 'Laravel入門書', 'description' => '初心者向けの解説書', 'price' => 2800, 'stock' => 20, 'is_published' => true, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'PHP実践ガイド', 'description' => '中級者向け', 'price' => 3200, 'stock' => 15, 'is_published' => true, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => '大学ノート', 'description' => 'B5サイズ', 'price' => 180, 'stock' => 200, 'is_published' => true, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'ボールペン', 'description' => '黒・赤・青', 'price' => 120, 'stock' => 300, 'is_published' => true, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'クリアファイル', 'description' => 'A4サイズ', 'price' => 100, 'stock' => 150, 'is_published' => true, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'マーカーペン', 'description' => '蛍光5色セット', 'price' => 580, 'stock' => 80, 'is_published' => true, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'ホッチキス', 'description' => '30枚とじ', 'price' => 680, 'stock' => 70, 'is_published' => true, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => '付箋', 'description' => '5色セット', 'price' => 320, 'stock' => 150, 'is_published' => true, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => 'クリップ', 'description' => '50個入り', 'price' => 200, 'stock' => 200, 'is_published' => true, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
            ['name' => '消しゴム', 'description' => 'プラスチック製', 'price' => 80, 'stock' => 500, 'is_published' => true, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null],
        ]);
    }
}
