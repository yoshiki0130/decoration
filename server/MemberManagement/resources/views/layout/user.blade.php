@extends('layout/layout')
@section('header')
<header class="header">
  <nav class="navbar navbar-expand navbar-dark bg-dark mt-3 mb-3">
    <a href="/user/top" class="navbar-brand">マイページ</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/user/coupon">クーポン一覧</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/user/diary">日記一覧</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/user/diary/create">日記作成</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/user/edit/registration">登録情報変更</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/user/faq">よくある質問（FAQ）</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/user/contact">お問い合わせ</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/user/unscribe">退会</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
        @if (Session::has('name'))
        <li class="nav-item active">  
          <a class="nav-link" href="/user/top">{{ session('name') }}さん</a>
        </li>
        <li class="nav-item active">  
          <a class="btn btn-success" href="/logout">ログアウト</a>
        </li>
        @else
        <li class="nav-item active">
          <a class="btn btn-success" href="/login">ログイン</a>
        </li>
            @endif
        </ul>
      </div>
    </header>
    @endsection
  </nav>

@section('footer')
<footer class="footer">
{{--   管理用フッター --}}

</footer>
@endsection