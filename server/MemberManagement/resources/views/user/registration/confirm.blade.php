@extends('layout/layout')
@section('content')
<div>
@if ($mode === 'edit')
  <h1>会員情報変更</h1>
  <form action="/user/edit/store" method="post">
@else
  <h1>新規会員登録</h1>
  <form action="/user/create/store" method="post">
@endif
    {{ csrf_field() }}
    <table>
      <tr>
        <th>名前</th>
        <td>
          {{ $input['name1'] }} {{ $input['name2'] }}
          <input type="hidden" name="name1" value="{{ $input['name1'] }}">
          <input type="hidden" name="name2" value="{{ $input['name2'] }}">
        </td>
      </tr>
       <tr>
        <th>フリガナ</th>
        <td>
          {{ $input['yomi1'] }} {{ $input['yomi2'] }}
          <input type="hidden" name="yomi1" value="{{ $input['yomi1'] }}">
          <input type="hidden" name="yomi2" value="{{ $input['yomi2'] }}">
        </td>
      </tr> 
      <tr>
        <th>会員ID</th>
        <td>
          {{ $input['user_id'] }}
          <input type="hidden" name="user_id" value="{{ $input['user_id'] }}">
        </td>
      </tr>
      <tr>
        <th>パスワード</th>
        <td>
          {{ $input['password'] }}
          <input type="hidden" name="password" value="{{ $input['password'] }}">
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          {{ $input['email'] }}
          <input type="hidden" name="email" value="{{ $input['email'] }}">
        </td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          {{ $input['gender_name'] }}
          <input type="hidden" name="gender_id" value="{{ $input['gender_id'] }}">
        </td>
      </tr>
      <tr>
        <th>住所</th>
        <td>
          {{ $input['prefecture_name'] }}
          <input type="hidden" name="prefecture_id" value="{{ $input['prefecture_id'] }}">
        </td>
      </tr>
    </table>
    <hr>
    <p>以上の内容でよろしいですか？</p>
@if ($mode === 'edit')
    <button type="submit" class="btn btn-primary">変更</button>
@else
    <button type="submit" class="btn btn-primary">登録</button>
@endif
    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">内容を修正する</a>
  </form>
</div>
@stop