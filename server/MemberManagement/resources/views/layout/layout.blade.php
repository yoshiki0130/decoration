<!DOCTYPE html>
<html lang="ja">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <script src="{{ asset('js/app.js') }}" defer></script>
  @yield('cdn')
  @yield('script_head')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @yield('css')
</head>

<body>
  @yield('header')

  <div class="container">
    @if(Session::has('message'))
      <div class="alert alert-primary" role="alert">
        {{ session('message') }}
      </div>
    @endif
    @yield('content')
  </div>

  @yield('footer')
  @yield('script_body')
</body>

</html>
