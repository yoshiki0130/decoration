@extends('layout/user')
@section('content')
<div>
  <h1>ログイン</h1>
  <div>
    @if (Session::has('message'))
        <p>{{ session('message') }}</p>
    @endif
  </div>
  <form action="/login" method="post">
    {{ csrf_field() }}
    <ul>
      <li>
        <label for="id">登録したメールアドレス</label>
        <input type="text" name="email">
      </li>
      <li>
        <label for="pass">パスワード</label>
        <input type="text" name="password">
      </li>
    </ul>
    <button type="submit" class="btn btn-primary">ログイン</button>
  </form>
  <p>
    {{--  <a href="/user/reissue">パスワードを忘れてしまった</a>  --}}
  </p>
  <hr>
  <br>
  <p>
    <a href="/user/create/registration" class="btn btn-success">新規会員登録</a>
  </p>
</div>
@stop