<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PaginationController extends Controller
{
    public function index(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'per_page' => 'nullable|integer|in:10,20,50',
            'sort_by' => 'nullable|string|in:created_at,price,name,stock',
            'sort_order' => 'nullable|string|in:asc,desc'
        ]);

        // バリデーション済みの値を取得（デフォルト値あり）
        $perPage = $validated['per_page'] ?? 10;
        $sortBy = $validated['sort_by'] ?? 'created_at';
        $sortOrder = $validated['sort_order'] ?? 'desc';

        // ページネーション
        $products = Product::with('category')
            ->orderBy($sortBy, $sortOrder)
            ->paginate($perPage);

        return view('pagination.index', compact('products', 'perPage', 'sortBy', 'sortOrder'));
    }
}
