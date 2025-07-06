<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title', 'TODO管理')</title>
    @yield('styles')
</head>
<body class="d-flex flex-column min-vh-100">
  <header class="p-0">
    <nav class="navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
        <div>
          <h1 class="ms-4 mb-2"><a class="navbar-brand fs-3" href="{{ route('task-groups.index') }}">TODO管理</a></h1>
        </div>
    </nav>
  </header>
  <main class="flex-grow-1" style="padding-bottom: 7rem;">
      @yield('content')
  </main>
  <footer class="bg-dark text-white text-center py-5 mt-auto">
      <small>&copy; {{ date('Y') }} TODO管理アプリ. All rights reserved.</small>
  </footer>
</body>
</html>