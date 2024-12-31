<header class="header">
  <div class="container">
      <h1 class="logo">ポケポケ攻略</h1>
      <nav class="nav">
          <ul>
            <li><a href="/">ホーム</a></li>
            <li><a href="/packs">パック一覧</a></li>
            <li><a href="/cards">カードリスト</a></li>
            <li><a href="#">Tierランキング</a></li>
            <li><a href="#">デッキ一覧</a></li>
          </ul>
          <div class="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
          </div>
      </nav>
      @auth
        <div class="user-menu">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-link">ログアウト</button>
            </form>
        </div>
      @endauth
  </div>
</header>
