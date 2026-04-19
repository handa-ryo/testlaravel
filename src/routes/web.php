<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);
