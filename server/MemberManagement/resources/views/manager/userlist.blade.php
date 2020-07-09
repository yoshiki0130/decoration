@extends('layout/manager')
@section('content')
<div>
  @if (Session::has('message'))
  <p>{{ session('message') }}</p>
  @endif
</div>
<div>
<h1>ユーザ検索・一覧</h1>
@if (isset($userlist))
  <table class="table">
      <tr>
        <th>ユーザ名</th>
        <th>性別</th>
        <th>登録日</th>
        <th>住所</th>
      </tr>
      @foreach ($userlist as $user)
      <tr>
        <td>{{ $user['name1'] . $user['name2'] }}</td>
        <td>{{ $user['gender_name'] }}</td>
        <td>{{ $user['prefecture_name'] }}</td>
        <td>{{ date('Y/m/d', strtotime($user['created_at'])) }}</td>
      </tr>
      @endforeach
  </table>
@endif
</div>
@stop