<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="{{ route('products.index') }}"
                class="text-blue-600 hover:underline">← 一覧に戻る</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>

            <div class="space-y-3">
                <div class="flex border-b pb-2">
                    <span class="font-semibold w-32">ID:</span>
                    <span>{{ $product->id }}</span>
                </div>

                <div class="flex border-b pb-2">
                    <span class="font-semibold w-32">カテゴリー:</span>
                    <span>{{ $product->category->name }}</span>
                </div>

                <div class="flex border-b pb-2">
                    <span class="font-semibold w-32">価格:</span>
                    <span class="text-xl text-red-600">¥{{ number_format($product->price) }}</span>
                </div>

                <div class="flex border-b pb-2">
                    <span class="font-semibold w-32">在庫:</span>
                    <span>{{ $product->stock }} 個</span>
                </div>

                <div class="flex border-b pb-2">
                    <span class="font-semibold w-32">公開状態:</span>
                    <span>
                        @if ($product->is_published)
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">公開中</span>
                        @else
                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-sm">非公開</span>
                        @endif
                    </span>
                </div>

                <div class="border-b pb-2">
                    <span class="font-semibold">説明:</span>
                    <p class="mt-2 text-gray-700">{{ $product->description ?? '説明はありません' }}</p>
                </div>

                <div class="flex border-b pb-2">
                    <span class="font-semibold w-32">登録日時:</span>
                    <span>{{ $product->created_at->format('Y年m月d日 H:i') }}</span>
                </div>

                <div class="flex border-b pb-2">
                    <span class="font-semibold w-32">更新日時:</span>
                    <span>{{ $product->updated_at->format('Y年m月d日 H:i') }}</span>
                </div>
            </div>

            <div class="mt-6 space-x-3">
                <a href="{{ route('products.edit', $product->id) }}"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                    編集
                </a>
                <form action="{{ route('products.destroy', $product->id) }}"
                    method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded"
                        onclick="return confirm('本当に削除しますか？')">
                        削除
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
