<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 商品一覧
    public function index()
    {
        // 公開されている商品を新しい順に取得（カテゴリー情報も一緒に）
        $products = Product::with('category')
            ->where('is_published', true)
            ->latest()
            ->get();

        return view('products.index', compact('products'));
    }

    // 商品登録フォーム表示
    public function create()
    {
        // カテゴリー一覧を取得
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    // 商品登録処理
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'is_published' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => '商品名は必須です',
            'name.max' => '商品名は255文字以内で入力してください',
            'price.required' => '価格は必須です',
            'price.integer' => '価格は整数で入力してください',
            'price.min' => '価格は0円以上で入力してください',
            'stock.required' => '在庫数は必須です',
            'stock.integer' => '在庫数は整数で入力してください',
            'stock.min' => '在庫数は0以上で入力してください',
            'category_id.required' => 'カテゴリーは必須です',
            'category_id.exists' => '選択されたカテゴリーは存在しません',
        ]);

        // 公開状態のデフォルト値
        $validated['is_published'] = $request->has('is_published');

        // 商品を作成
        Product::create($validated);

        // リダイレクト
        return redirect()
            ->route('products.index')
            ->with('success', '商品を登録しました');
    }

    // 商品詳細
    public function show($id)
    {
        // カテゴリー情報も一緒に取得
        $product = Product::with('category')->findOrFail($id);

        return view('products.show', compact('product'));
    }

    // 商品編集フォーム表示
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    // 商品更新処理
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // バリデーション
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'is_published' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => '商品名は必須です',
            'price.required' => '価格は必須です',
            'stock.required' => '在庫数は必須です',
            'category_id.required' => 'カテゴリーは必須です',
        ]);

        // 公開状態の設定
        $validated['is_published'] = $request->has('is_published');

        // 更新
        $product->update($validated);

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', '商品を更新しました');
    }

    // 商品削除処理
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', '商品を削除しました');
    }
}
