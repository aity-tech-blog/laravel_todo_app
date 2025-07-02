<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TODOアプリ')</title>
    @yield('styles')
</head>
<body>
    <header>
        <h1>TODOアプリ</h1>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>