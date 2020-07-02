@extends('layout/layout')
@section('content')
<div>
  @if (Session::has('message'))
      <p>{{ session('message') }}</p>
  @endif
</div>
<div>
  <h1>マイページ</h1>
  <ul>
     <li><a href="/user/coupon">クーポン一覧</a></li> 
     <li><a href="">日記一覧</a></li> 
     <li><a href="/user/edit">登録情報変更</a></li>
     <li><a href="/user/faq">よくある質問（FAQ）</a></li> 
     <li><a href="/user/contact">お問い合わせ</a></li>
     <li><a href="/user/unscribe">退会</a></li>
  </ul>
  {{--  自分の書いた最新記事数件
  投稿された記事最新から数件  --}}
</div>
@stop