@extends('layout/manager')
@section('content')
@section('title', 'トップページ')
<div>
  <h1>機能一覧</h1>
  <ul>
    <li><a href="/manager/userlist">会員検索・一覧</a></li>
    <li><a href="/manager/analysis">会員分析</a></li>
    <li><a href="/manager/coupon">クーポン管理</a></li>
  </ul>
</div>
@stop