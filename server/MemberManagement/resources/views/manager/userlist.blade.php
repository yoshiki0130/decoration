@extends('layout/manager')
@section('content')
<div>
  @if (Session::has('message'))
  <p>{{ session('message') }}</p>
  @endif
</div>
<div>
  <h1>ユーザ検索・一覧</h1>
  <form action="/manager/userlist" method="GET">
    姓<input type="text" name="name1" value="@isset($inputs['name1']){{ $inputs['name1'] }}@endisset">
    名<input type="text" name="name2" value="@isset($inputs['name2']){{ $inputs['name2'] }}@endisset">

    性別
    @foreach ($genders as $gender)
    @if ($loop->first)
    <label>
      <input type="radio" name="gender_id" value="" @empty($inputs['gender_id']) checked @endempty>
      指定しない
    </label>
    @endif
    <label>
      @if (isset($inputs['gender_id']) && $gender['id'] == $inputs['gender_id'])
      <input type="radio" name="gender_id" value="{{ $gender['id'] }}" checked>
      {{ $gender['name'] }}
      @else
      <input type="radio" name="gender_id" value="{{ $gender['id'] }}">
      {{ $gender['name'] }}
      @endif
    </label>
    @endforeach

    住所
    <select name="prefecture_id">
      <option value="">都道府県</option>
      @foreach ($prefectures as $prefecture)
      @if (isset($inputs['prefecture_id']) && $prefecture['id'] == $inputs['prefecture_id'])
      <option value="{{ $prefecture['id'] }}" selected>{{ $prefecture['name'] }}</option>
      @else
      <option value="{{ $prefecture['id'] }}">{{ $prefecture['name'] }}</option>
      @endif
      @endforeach
    </select>
    <p>
      登録日
      <input type="date" name="min" value="@isset($inputs['min']){{ $inputs['min'] }}@endisset">
      ～
      <input type="date" name="max" value="@isset($inputs['max']){{ $inputs['max'] }}@endisset">
    </p>

    <button type="submit" class="btn btn-primary">検索</button>
    <button type="reset" class="btn btn-secondary">条件リセット</button>
  </form>
  @isset ($userlist)
  <table class="table">
    <tr>
      <th>ユーザ名</th>
      <th>性別</th>
      <th>住所</th>
      <th>登録日</th>
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
  @endisset
</div>
@stop