@extends('layout/user')
@section('content')
@section('title', 'ユーザープロフィール')
<div>
  <h1>ユーザープロフィール</h1>
  <div>
  <p>名前：<? echo $data->name1; ?> <? echo $data->name2; ?></P>
  <p>読み：<? echo $data->kana1; ?> <? echo $data->kana2; ?></P>
  </div>
</div>
<a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">日記詳細に戻る</a>

@stop