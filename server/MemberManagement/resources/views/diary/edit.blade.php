@extends('layout/user')
@section('content')
@section('title', '日記詳細')
<div>
  <h1>日記編集</h1>
  <div>
  <form method="post" action="/user/diary/edit_diary">
  @csrf
  <p>タイトル：<br>
  <input type="text" name="edit_title" value="<? echo $data['edit_title'] ?>" style="width: 500px;"></p>
  <p>本文：<br>
  <textarea name="edit_diary" cols="68" rows="4"><? echo $data['edit_diary'] ?></textarea></p>
  ユーザープロフィール公開設定<br>
  <label><input type="radio" value="0" name="edit_release" {{$release->release == 0 ? 'checked': null }}>公開</label><br>
  <label><input type="radio" value="1" name="edit_release" {{$release->release == 1 ? 'checked': null }}>非公開</label><br>
  <input type="hidden" name="edit_id" value="<? echo $data['edit_id'] ?>">
  <button type="submit" class="btn btn-primary">編集完了</button>
  </form>
  </div>
</div>
<a href="/user/top" class="btn btn-secondary">日記詳細に戻る</a>

@stop