@extends('layout/user')
@section('title', '日記詳細')
@section('content')
<div>
  <p class="text-secondary">日記詳細</p>
  <!-- <p>タイトル：<br> -->
    <h1>
    <? echo $data->title ?></p>
    </h1>
  <!-- <p>本文　　：<br> -->
    <? echo $data->diary ?>
    </p>

@if (session('name') == $name || $evaluation)
いいね：<? echo $count; ?>
@else
<form method="post" name="good" action="/user/diary/good">
@csrf
<input type="hidden" name="good_user" value="{{ session('id') }}">
<input type="hidden" name="good_diary" value="<? echo $data->id; ?>">
<a href="javascript:void(0)" onclick="document.good.submit()" class="btn btn-primary btn-sm">いいね：<? echo $count; ?></a>
</form>
@endif

@if ($data->release == 0)
<form method="post" name="diary" action="/user/diary/profile">
@csrf
<input type="hidden" name="user_id" value="<? echo $data->users_id; ?>">
<a href="javascript:void(0)" onclick="document.diary.submit()" class="btn btn-secondary">ユーザープロフィール</a>
</form>
@endif

<br>
@if (session('name') == $name)
<form method="post" name="edit" action="/user/diary/edit">
@csrf
<input type="hidden" name="edit_title" value="<? echo $data->title ?>">
<input type="hidden" name="edit_diary" value="<? echo $data->diary ?>">
<input type="hidden" name="edit_id" value="<? echo $data->id ?>">
<a href="javascript:void(0)" onclick="document.edit.submit()" class="btn btn-secondary">日記編集</a>
@endif

<a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">日記一覧に戻る</a>

@stop