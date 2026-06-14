<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧（ページネーション）</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .pagination {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #333;
        }

        .pagination .active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <h1>商品一覧（ページネーション）</h1>

    <form method="GET" action="/pagination" style="margin-bottom: 20px;">
        <label>表示件数: </label>
        <select name="per_page" onchange="this.form.submit()">
            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10件</option>
            <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20件</option>
            <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50件</option>
        </select>
    </form>

    {{-- ソート選択 --}}
    <form method="GET" action="/pagination" style="margin-bottom: 20px;">
        <input type="hidden" name="per_page" value="{{ $perPage }}">

        <label>並び順: </label>
        <select name="sort_by" onchange="this.form.submit()">
            <option value="created_at" {{ $sortBy == 'created_at' ? 'selected' : '' }}>登録日</option>
            <option value="price" {{ $sortBy == 'price' ? 'selected' : '' }}>価格</option>
            <option value="name" {{ $sortBy == 'name' ? 'selected' : '' }}>商品名</option>
            <option value="stock" {{ $sortBy == 'stock' ? 'selected' : '' }}>在庫数</option>
        </select>

        <select name="sort_order" onchange="this.form.submit()">
            <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>昇順</option>
            <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>降順</option>
        </select>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>商品名</th>
                <th>カテゴリー</th>
                <th>価格</th>
                <th>在庫</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>¥{{ number_format($product->price) }}</td>
                <td>{{ $product->stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ページネーションリンク（全てのパラメータを保持） --}}
    {{ $products->appends([
    'per_page' => $perPage,
    'sort_by' => $sortBy,
    'sort_order' => $sortOrder
])->links() }}
</body>

</html>
