@extends('layout/user')
@section('content')
@section('title', 'パスワード再発行')
<h1>パスワード再発行</h1>
<div>
  <p>
    登録時に使用したメールアドレスを入力してください。
    <form action="/user/reissue/done" method="post">
      {{ csrf_field() }}
      <input type="text" name="email">
      <button type="submit" class="btn btn-primary">パスワード再発行</button>
    </form>
  </p>
</div>
@stop