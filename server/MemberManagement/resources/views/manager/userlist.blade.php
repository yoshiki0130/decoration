@extends('layout/manager')
@section('content')
@section('title', '会員検索・一覧')
<div>
  <h1>会員検索・一覧</h1>
  <form action="/manager/userlist" method="GET" id="userSearch">
    @include('layout/parts/usersearch')
    <button type="submit" class="btn btn-primary" form="userSearch">検索</button>
    <button type="reset" class="btn btn-secondary" form="userSearch">条件リセット</button>
  </form>

  @include('layout/parts/userlist')
</div>
@stop