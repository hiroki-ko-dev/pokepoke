<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ポケポケ攻略 | @yield('title', 'トップ')</title>
    @vite('resources/scss/home/style.scss')
</head>
<body>
    @include('layouts.common.header')

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 ポケポケ All Rights Reserved.</p>
        </div>
    </footer>
</body>
<script>
  document.querySelector('.hamburger-menu').addEventListener('click', function() {
      document.querySelector('.nav ul').classList.toggle('open');
      this.classList.toggle('open');
  });
</script>
</html>