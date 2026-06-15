<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品編集</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background: #45a049;
        }

        .current-image {
            margin: 10px 0;
        }

        .current-image img {
            border: 2px solid #ddd;
            border-radius: 8px;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <h1>商品編集</h1>

    <form action="/image-upload/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>商品名</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>説明</label>
            <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>価格</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" required>
            @error('price')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>在庫数</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required>
            @error('stock')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>カテゴリー</label>
            <select name="category_id" required>
                <option value="">選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_published" value="1"
                    {{ old('is_published', $product->is_published) ? 'checked' : '' }}>
                公開する
            </label>
        </div>

        <div class="form-group">
            <label>商品画像</label>

            {{-- 現在の画像を表示 --}}
            @if($product->image)
            <div class="current-image">
                <p>現在の画像：</p>
                <img src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                    style="width: 200px; height: 200px; object-fit: cover;">
            </div>
            @endif

            <label>新しい画像をアップロード（変更する場合のみ）</label>
            <input type="file" name="image" accept="image/*">
            <small style="color: #666;">※ 画像を選択しない場合は、現在の画像がそのまま保持されます</small>

            @error('image')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">更新</button>
        <a href="/image-upload/list" style="margin-left: 10px;">キャンセル</a>
    </form>
</body>

</html>
