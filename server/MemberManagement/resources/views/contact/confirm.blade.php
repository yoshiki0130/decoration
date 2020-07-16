@extends('layout/user')
@section('content')
<div>
  <h1>お問い合わせ</h1>
  <form action="/user/contact/done" method="post">
    {{ csrf_field() }}
    <h4>お問い合わせ内容</h4>
    {{ $input }}
    <input type="hidden" name="content" value="{{ $input }}">
    <br>
    <button type="submit" class="btn btn-primary">送信</button>
    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">内容を修正する</a>
    <hr>
  </form>
  <a href="user/my" class="btn btn-secondary">マイページに戻る</a>

</div>
@stop