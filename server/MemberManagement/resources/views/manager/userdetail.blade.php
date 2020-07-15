@extends('layout/manager')
@section('content')
<div>
  <h1>会員詳細</h1>
  @csrf
  <table>
    <tr>
      <th>名前</th>
      <td>{{ $user['name1'] .' '.$user['name2'] }}</td>
    </tr>
    <tr>
      <th>フリガナ</th>
      <td>{{ $user['yomi1'] .' '.$user['yomi2'] }}</td>
    </tr>
    <tr>
      <th>パスワード</th>
      <td>{{ $user['password'] }}</td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td>{{ $user['email'] }}</td>
    </tr>
    <tr>
      <th>性別</th>
      <td>{{ $user['gender_name'] }}</td>
    </tr>
    <tr>
      <th>住所</th>
      <td>{{ $user['prefecture_name'] }}</td>
    </tr>
    <tr>
      <th>登録日</th>
      <td>{{ date('Y/m/d', strtotime($user['created_at'])) }}</td>
    </tr>
  </table>
  <hr>
  <button onclick="history.back()" class="btn btn-secondary">一覧へ戻る</button>
</div>
@stop