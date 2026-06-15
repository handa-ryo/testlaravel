<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        .success {
            background: #d4edda;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
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
            background: #4CAF50;
            color: white;
        }

        img {
            border-radius: 4px;
        }

        .btn {
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 5px;
        }

        .btn-edit {
            background: #2196F3;
            color: white;
        }

        .btn-delete {
            background: #f44336;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-create {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <h1>商品一覧</h1>

    @if(session('success'))
    <div class="success">{{ session('success') }}</div>
    @endif

    <a href="/image-upload" class="btn btn-create">新規登録</a>

    <table>
        <thead>
            <tr>
                <th>画像</th>
                <th>ID</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                    No Image
                    @endif
                </td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>¥{{ number_format($product->price) }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="/image-upload/{{ $product->id }}/edit" class="btn btn-edit">編集</a>
                    <form action="/image-upload/{{ $product->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete"
                            onclick="return confirm('本当に削除しますか？')">
                            削除
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
