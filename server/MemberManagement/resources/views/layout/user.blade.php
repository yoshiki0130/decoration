<!DOCTYPE html>
<html lang="ja">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  {{-- jQuery読み込み --}}
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

  <script>
    {{--@yield('script')--}}
  </script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <header style="background: #dee">
    <p>
      <a href="/">トップ</a>　
      @if (Session::has('name'))
      {{ session('name') }}さん　<a href="/logout">ログアウト</a>
      @else
      <a href="/login">ログイン</a>
      @endif
    </p>
  </header>

  <div class="container">
    @if (Session::has('message'))
    <div class="alert alert-primary" role="alert">
      {{ session('message') }}
    </div>
    @endif
    @yield('content')
  </div>

  <footer style="background: #dee">
    フッター
  </footer>
</body>

</html>