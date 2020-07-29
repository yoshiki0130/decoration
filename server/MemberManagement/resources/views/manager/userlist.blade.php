@extends('layout/manager')
@section('content')
<div>
  <h1>会員検索・一覧</h1>
  <form action="/manager/userlist" method="GET" id="userSearch">
    @include('manager/parts/usersearch')
    <button type="submit" class="btn btn-primary" form="userSearch">検索</button>
    <button type="reset" class="btn btn-secondary" form="userSearch">条件リセット</button>
  </form>

  @include('manager/parts/userlist')
</div>
@stop