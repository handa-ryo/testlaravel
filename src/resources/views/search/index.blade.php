<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品検索</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-form input {
            padding: 8px;
            width: 300px;
        }

        .search-form button {
            padding: 8px 16px;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
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
            text-left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <h1>商品検索</h1>

    {{-- 検索フォーム --}}
    <form method="GET" action="/search" class="search-form">
        <input type="text" name="keyword" placeholder="商品名で検索" value="{{ $keyword }}">

        <select name="category_id">
            <option value="">すべてのカテゴリー</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>

        <button type="submit">検索</button>
    </form>

    <p>検索結果: {{ $products->total() }}件</p>

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
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>¥{{ number_format($product->price) }}</td>
                <td>{{ $product->stock }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">該当する商品が見つかりませんでした</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- ページネーションリンク（検索条件を保持） --}}
    {{ $products->appends(['keyword' => $keyword, 'category_id' => $categoryId])->links() }}
</body>

</html>
