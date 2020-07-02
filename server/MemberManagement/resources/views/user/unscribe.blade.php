@extends('layout/layout')
@section('content')
<div>
  <h1>退会</h1>
  <p>本当に退会しますか？</p>
  <hr>
  <a href="/user/unscribe/done" class="btn btn-danger">退会する</a>
  <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">マイページに戻る</a>
</div>
@stop