<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('image-upload.index', compact('products'));
    }

    // 登録フォーム表示
    public function create()
    {
        return view('image-upload.create');
    }

    // 登録処理
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:1000',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048', // 2MB以下の画像のみ
        ]);

        // 画像がアップロードされた場合のみ保存
        if ($request->hasFile('image')) {
            // storage/app/public/products に保存
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        // 商品を作成
        Product::create($validated);

        // return view('image-upload.create');

        return redirect('/image-upload')->with('success', '商品を登録しました');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('image-upload.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        // 新しい画像がアップロードされた場合
        if ($request->hasFile('image')) {
            // 🔥 古い画像を削除
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // 新しい画像を保存
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        $product->update($validated);

        return redirect('/image-upload/list')->with('success', '商品を更新しました');
    }

    public function destroy(Product $product)
    {
        // 商品に画像がある場合は削除
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect('/image-upload/list')->with('success', '商品を削除しました');
    }
}
