<?php

use App\Http\Controllers\PaginationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php

Route::get('/hello', function () {
    return 'Hello, World!!';
});
// routes/web.php

Route::get('/about', function () {
    return '<h1>会社概要</h1><p>私たちは素晴らしい会社です。</p>';
});
// routes/web.php

Route::get('/company', function () {
    return view('company');
});
// routes/web.php

Route::get('/user/{id}', function ($id) {
    return 'ユーザーID: ' . $id;
});

// routes/web.php

Route::get('/post/{category}/{id}', function ($category, $id) {
    return "カテゴリ: {$category}, 記事ID: {$id}";
});

Route::get('/prhshgshghsofile', function () {
    return 'プロフィールページ';
})->name('profile');

Route::get('/user/{id}', function ($id) {
    return "ユーザーID: {$id}";
})->name('user.show');

// routes/web.php

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return '管理画面ダッシュボード';
    })->name('dashboard');  // ルート名: admin.dashboard

    Route::get('/users', function () {
        return 'ユーザー管理';
    })->name('users');      // ルート名: admin.users
});

// routes/web.php

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/greeting', function () {
    $age = 25;

    return view('greeting', compact('age'));
});

Route::get('/xss-demo', function () {
    // 攻撃者が入力したコメント（本来はフォームから受け取る）
    // $comment = 'こんにちは<script>alert("XSS攻撃成功！")</script>';

    // $comment = '<img src=x onerror="alert(\'画像でも攻撃できる\')">';

    // 例2: ページを改ざん
    // $comment = '<script>document.body.innerHTML = "<h1>乗っ取られました</h1>"</script>';

    // 例3: 普通のHTML（安全な使い方）
    $comment = '<strong>太字</strong>のテキスト';

    return view('xss-demo', compact('comment'));
});

Route::get('/layout/home', function () {
    return view('pages.home');
});

Route::get('/layout/about', function () {
    return view('pages.about');
});

Route::get('/layout/contact', function () {
    return view('pages.contact');
});

Route::get('/component-demo', function () {
    return view('component-demo');
});

Route::resource('users', UserController::class);

// routes/web.php

Route::get('/session-test', function () {
    // セッションにデータを保存
    session(['user_name' => '太郎']);
    session(['cart_count' => 3]);
    session(['last_page' => 'products']);

    // HTMLタグを含む文字列を返す（Laravelは自動的にHTMLとして出力する）
    return 'セッションにデータを保存しました！<br><a href="/session-show">セッションを確認</a>';
});

Route::get('/session-show', function () {
    // セッションからデータを取得
    $userName = session('user_name');
    $cartCount = session('cart_count');
    $lastPage = session('last_page');

    // 全てのセッションデータを表示
    dd(session()->all());
});

// 削除済み商品一覧
Route::get('/products/trashed', [ProductController::class, 'trashed'])->name('products.trashed');

// 商品復元
Route::patch('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');

// 完全削除
Route::delete('/products/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');

Route::resource('products', ProductController::class);

Route::get('/search', [SearchController::class, 'index']);

Route::get('/pagination', [PaginationController::class, 'index']);

// 商品一覧
Route::get('/image-upload/list', [ImageUploadController::class, 'index']);

Route::get('/image-upload/create', [ImageUploadController::class, 'create']);  // 登録フォーム
Route::post('/image-upload', [ImageUploadController::class, 'store']);         // 登録処理

// 商品編集フォーム表示
Route::get('/image-upload/{product}/edit', [ImageUploadController::class, 'edit']);

// 商品更新
Route::put('/image-upload/{product}', [ImageUploadController::class, 'update']);

// 商品削除
Route::delete('/image-upload/{product}', [ImageUploadController::class, 'destroy']);
