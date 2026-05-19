<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">商品一覧</h1>
            <a href="{{ route('products.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                新規登録
            </a>
        </div>

        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white shadow-md rounded overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">商品名</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">カテゴリー</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">価格</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">在庫</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">操作</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $product)
                    <tr>
                        <td class="px-6 py-4">{{ $product->id }}</td>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->category->name }}</td>
                        <td class="px-6 py-4">¥{{ number_format($product->price) }}</td>
                        <td class="px-6 py-4">{{ $product->stock }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('products.show', $product->id) }}"
                                class="text-blue-600 hover:underline">詳細</a>
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="text-green-600 hover:underline">編集</a>
                            <form action="{{ route('products.destroy', $product->id) }}"
                                method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:underline"
                                    onclick="return confirm('本当に削除しますか？')">
                                    削除
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
