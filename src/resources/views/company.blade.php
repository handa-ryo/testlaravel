<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="{{ 'profile' }}">プロフィール</a>

// resources/views/header.blade.php
<a href="{{ route('profile') }}">マイページ</a>

<a href="{{ route('user.show', ['id' => 1]) }}">ユーザー1</a>
<a href="{{ route('user.show', ['id' => 100]) }}">ユーザー100</a>

<a href="{{ route('admin.users') }}">admin/users</a>
<a href="{{ route('admin.dashboard') }}">admin/dashboard</a>
</body>
</html>
