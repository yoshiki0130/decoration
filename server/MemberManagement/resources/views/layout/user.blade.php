@extends('layout/layout')
@section('header')
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
@endsection

@section('footer')
<footer style="background: #dee">
  フッター
</footer>
@endsection