@extends('layout/layout')
@section('content')
<div>
  <h1>新規会員登録</h1>
  <form action="/user/create/done" method="post">
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
          @if (isset($input['gender']))
            @if ($input['gender'] == 1)
            男
            @else
            女
            @endif
            <input type="hidden" name="gender" value="{{ $input['gender'] }}">
          @endif
        </td>
      </tr>
      <tr>
        <th>住所</th>
        <td>
          {{ $input['prefecture'] }}
          <input type="hidden" name="prefecture" value="{{ $input['prefecture'] }}">
        </td>
      </tr>
    </table>
    <hr>
    <p>以上の内容でよろしいですか？</p>
    <button type="submit" class="btn btn-primary">登録</button>
    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">内容を修正する</a>
  </form>
  <a href="/" class="btn btn-outline-danger">登録をやめる</a>

</div>
@stop