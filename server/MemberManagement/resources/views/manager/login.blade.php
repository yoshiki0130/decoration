@extends('layout/manager')
@section('content')
<div>
  <h1>ログイン</h1>
  <form action="/login" method="post">
    {{ csrf_field() }}
    <ul>
      <li>
        <label for="id">ID</label>
        <input type="text" name="admin_id">
      </li>
      <li>
        <label for="pass">パスワード</label>
        <input type="text" name="password">
      </li>
    </ul>
    <button type="submit" class="btn btn-primary">ログイン</button>
  </form>
</div>
@stop