@extends('layout/layout')
@section('content')
<div>
@if (isset($record))
  <h1>登録情報変更</h1>
  <form action="/user/edit/confirm" method="post">
@else
  <h1>新規会員登録</h1>
  <form action="/user/create/confirm" method="post">
@endif
    {{ csrf_field() }}
    {{--  登録はログインリンクが存在しないレイアウト使おうかな  --}}
    <table>
      <tr>
        <th>名前</th>
        <td>
          姓<input type="text" name="name1"
          @if (isset($record['name1']))
              value="{{ $record['name1'] }}"
          @endif
          >
          名<input type="text" name="name2"
          @if (isset($record['name2']))
              value="{{ $record['name2'] }}"
          @endif
          >
        </td>
      </tr>
      <tr>
        <th>フリガナ</th>
        <td>
          姓<input type="text" name="yomi1"
          @if (isset($record['yomi1']))
              value="{{ $record['yomi1'] }}"
          @endif
          >
          名<input type="text" name="yomi2"
          @if (isset($record['yomi2']))
              value="{{ $record['yomi2'] }}"
          @endif
          >
        </td>
      </tr>
      <tr>
        <th>希望する会員ID</th>
        <td>
          <input type="text" name="user_id"
          @if (isset($record['user_id']))
              value="{{ $record['user_id'] }}"
          @endif
          >
          半角英数字とアンダーバー(_)、ハイフン(-)
        </td>
      </tr>
      <tr>
        <th>パスワード</th>
        <td>
          {{-- 2回入力ではなく表示切り替え実装したい --}}
          <input type="text" name="password"
          @if (isset($record['password']))
              value="{{ $record['password'] }}"
          @endif
          >
          半角英数字とアンダーバー(_)、ハイフン(-)
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          <input type="email" name="email" size="40"
          @if (isset($record['email']))
              value="{{ $record['email'] }}"
          @endif
          >
        </td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
@foreach ($genders as $gender)
          <label>
  @if (isset($record) && $gender['id'] === $record['gender_id'])
            <input type="radio" name="gender_id" value="{{ $gender['id'] }}" checked>
            {{ $gender['name'] }}
  @else
            <input type="radio" name="gender_id" value="{{ $gender['id'] }}">
            {{ $gender['name'] }}
  @endif
          </label>
@endforeach
        </td>
      </tr>
      <tr>
        <th>住所</th>
        <td>
          <select name="prefecture_id">
            <option value="" selected>都道府県</option>
@foreach ($prefectures as $prefecture)
  @if (isset($record) && $prefecture['id'] === $record['prefecture_id'])
            <option value="{{ $prefecture['id'] }}" selected>{{ $prefecture['name'] }}</option>
  @else
            <option value="{{ $prefecture['id'] }}">{{ $prefecture['name'] }}</option>
  @endif
@endforeach
          </select>
        </td>
      </tr>
    </table>
    <hr>
@if (!isset($record))
    <h3>会員規約</h3>
    <div style="overflow: auto;height: 200px;border:1px solid black">
      <p>
        ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約
      </p>
      <p>
        ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約
      </p>
    </div>
    <button type="submit" class="btn btn-primary">規約に同意して確認</button>
    <a href="/" class="btn btn-secondary">登録をやめる</a>
@else
    <button type="submit" class="btn btn-primary">変更</button>
    <a href="/user/my" class="btn btn-secondary">マイページに戻る</a>
@endif
  </form>
</div>
@stop