@extends('layout/manager')
@section('content')
<div>
  <h1>ユーザ検索・一覧</h1>
  <form action="/manager/userlist" method="GET" id="userSearch">
    @include('manager/user/search')
    <button type="submit" class="btn btn-primary" form="userSearch">検索</button>
    <button type="reset" class="btn btn-secondary" form="userSearch">条件リセット</button>
  </form>

  @include('manager/user/list')
</div>
@stop