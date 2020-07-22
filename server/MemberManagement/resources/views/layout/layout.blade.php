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
  @yield('header')

  <div class="container">
    @if (Session::has('message'))
    <div class="alert alert-primary" role="alert">
      {{ session('message') }}
    </div>
    @endif
    @yield('content')
  </div>

  @yield('footer')
</body>

</html>