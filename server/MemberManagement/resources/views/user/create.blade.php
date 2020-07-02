@extends('layout/layout')
@section('content')
<div>
  <h1>新規会員登録</h1>
  <form action="/user/create/confirm" method="post">
    {{ csrf_field() }}
    {{--  登録はログインリンクが存在しないレイアウト使おうかな  --}}
    <table>
      <tr>
        <th>名前</th>
        <td>
          姓<input type="text" name="name1">
          名<input type="text" name="name2">
        </td>
      </tr>
       <tr>
        <th>フリガナ</th>
        <td>
          姓<input type="text" name="yomi1">
          名<input type="text" name="yomi2">
        </td>
      </tr> 
      <tr>
        <th>希望する会員ID</th>
        <td>
          <input type="text" name="user_id">
          半角英数字とアンダーバー(_)、ハイフン(-)
        </td>
      </tr>
      <tr>
        <th>パスワード</th>
        <td>
          {{-- 2回入力ではなく表示切り替え実装したい --}}
          <input type="text" name="password">
          半角英数字とアンダーバー(_)、ハイフン(-)
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          <input type="email" name="email" size="40">
        </td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          <label><input type="radio" name="gender" value="1">男</label>
          <label><input type="radio" name="gender" value="2">女</label>
        </td>
      </tr>
      <tr>
        <th>住所</th>
        {{-- あとでDBから取る形にする --}}
        <td>
          <select name="prefecture" id="">
            <option value="" selected>都道府県</option>
            @foreach ($prefectures as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
            </select>
        </td>
      </tr>
    </table>
    <hr>
    <h3>会員規約</h3>
    {{--  divにoverflow:autoとサイズ付ける  --}}
    <div style="overflow: auto;height: 200px;border:1px solid black">
      <p>
        ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約ここに規約
      </p>
    </div>
    <button type="submit" class="btn btn-primary">規約に同意して確認</button>
    <a href="/" class="btn btn-secondary">登録をやめる</a>
  </form>


</div>
@stop