<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header-utilities">
        <a class="header__logo" href="/">
          Todo
        </a>
        <nav class="header__logout">
          <ul class="header-nav">
            <li class="header-nav__item">
              <a class="header-nav__link" href="/category">カテゴリ一覧</a>
            </li>
            <li class="header__logout-item">
              {{-- TODO! もどし @if(Auth::check()) --}}
              <form class="form" action="/logout" method="post">
              @csrf
                <button class="header__logout-button">ログアウト</button>
              </form>
              {{-- TODO! もどし @endif --}}
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>