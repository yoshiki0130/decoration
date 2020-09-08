@extends('layout/user')
@section('content')
@section('title', '日記作成')
<div>
  <h1>日記作成</h1>
  <div>
  <form method="post" action="/user/diary/create_diary">
  @csrf
  <p>タイトル：<br>
  <input type="text" name="create_title" style="width: 500px;"></p>
  <p>本文：<br>
  <textarea name="create_diary" cols="68" rows="4"></textarea></p>
  ユーザープロフィール公開設定<br>
  <label><input type="radio" value="0" name="create_release" checked="checked">公開</label><br>
  <label><input type="radio" value="1" name="create_release">非公開</label><br>
  <input type="hidden" name="create_userid" value="{{ session('id') }}">
  <button type="submit" class="btn btn-primary">登録</button>
  </form>
  </div>
</div>
<a href="/user/top" class="btn btn-secondary">マイページに戻る</a>

@stop