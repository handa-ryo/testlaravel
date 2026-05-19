<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品編集</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="{{ route('products.show', $product->id) }}"
                class="text-blue-600 hover:underline">← 詳細に戻る</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">商品編集</h1>

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-purple-50 border border-purple-200 p-3 rounded mb-4">
                    <p class="text-xs text-gray-700 mb-1"><strong>💡 @method('PUT') / @method('DELETE') とは？</strong></p>
                    <p class="text-xs text-gray-600 mb-2">
                        HTMLの <code>
                            <form>
                        </code> タグは <strong>GET と POST しかサポートしていません</strong>。
                    </p>
                    <p class="text-xs text-gray-600">
                        しかしLaravelのリソースルートは PUT や DELETE を使います。<br>
                        <code>@method('PUT')</code> を使うと、Laravelが内部的にPUTリクエストとして扱ってくれます。<br>
                        これを<strong>HTTPメソッドの偽装（Method Spoofing）</strong>と言います。
                    </p>
                </div>

                <!-- 商品名 -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        商品名 <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name"
                        value="{{ old('name', $product->name) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- カテゴリー -->
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                        カテゴリー <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id" id="category_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('category_id'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('category_id') }}</p>
                    @endif
                </div>

                <!-- 価格 -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                        価格（円） <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="price" id="price"
                        value="{{ old('price', $product->price) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required min="0">
                    @if($errors->has('price'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('price') }}</p>
                    @endif
                </div>

                <!-- 在庫数 -->
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">
                        在庫数 <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="stock" id="stock"
                        value="{{ old('stock', $product->stock) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required min="0">
                    @if($errors->has('stock'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('stock') }}</p>
                    @endif
                </div>

                <!-- 説明 -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        説明
                    </label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
                    @if($errors->has('description'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('description') }}</p>
                    @endif
                </div>

                <!-- 公開状態 -->
                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_published" value="1"
                            {{ old('is_published', $product->is_published) ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">公開する</span>
                    </label>
                </div>

                <div class="flex space-x-3">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded">
                        更新
                    </button>
                    <a href="{{ route('products.show', $product->id) }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded inline-block">
                        キャンセル
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
