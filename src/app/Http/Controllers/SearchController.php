<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // リクエストから検索条件を取得
        $keyword = $request->input('keyword');
        $categoryId = $request->input('category_id');

        // 検索クエリを構築
        $query = Product::with('category');

        $products = $query->get();

        // when()メソッドで条件付きクエリを構築
        $products = Product::with('category')
            ->when($keyword, function ($query, $keyword) {
                return $query->where('name', 'like', "%{$keyword}%");
            })
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->paginate(10);

        // カテゴリー一覧を取得（プルダウン用）
        $categories = Category::all();

        return view('search.index', compact('products', 'keyword', 'categoryId', 'categories'));
    }
}
