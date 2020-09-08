@extends('layout/layout')
@section('header')
<header class="header">
  <nav class="navbar navbar-expand navbar-dark bg-dark mt-3 mb-3">
        <a href="/manager/top" class="navbar-brand">会員管理</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/manager/userlist">会員検索・一覧</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/manager/analysis">会員分析</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/manager/coupon">クーポン管理</a>
                </li>
            </ul>
        </div>
  </nav>
</header>
@endsection

@section('footer')
<footer class="footer">
{{--   管理用フッター --}}

</footer>
@endsection