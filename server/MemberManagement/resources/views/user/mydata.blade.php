@extends('layout/layout')
@section('content')
<div>
  <h1>会員情報変更</h1>
  <form action="/user/edit/confirm" method="post">
    {{ csrf_field() }}
    {{--  登録はログインリンクが存在しないレイアウト使おうかな  --}}
    <table>
      <tr>
        <th>名前</th>
        <td>
          姓<input type="text" name="name1" value="{{ $record['name1'] }}">
          名<input type="text" name="name2" value="{{ $record['name2'] }}">
        </td>
      </tr>
       <tr>
        <th>フリガナ</th>
        <td>
          姓<input type="text" name="yomi1" value="{{ $record['yomi1'] }}">
          名<input type="text" name="yomi2" value="{{ $record['yomi2'] }}">
        </td>
      </tr> 
      <tr>
        <th>希望する会員ID</th>
        <td>
          <input type="text" name="user_id" value="{{ $record['user_id'] }}">
          半角英数字とアンダーバー(_)、ハイフン(-)
        </td>
      </tr>
      <tr>
        <th>パスワード</th>
        <td>
          {{-- 2回入力ではなく表示切り替え実装したい --}}
          <input type="text" name="password" value="{{ $record['password'] }}">
          半角英数字とアンダーバー(_)、ハイフン(-)
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          <input type="email" name="email" size="40" value="{{ $record['email'] }}">
        </td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          @if ($record['gender'] === 1)
          <label><input type="radio" name="gender" value="1" checked>男</label>
          <label><input type="radio" name="gender" value="2">女</label>
          @else
          <label><input type="radio" name="gender" value="1" >男</label>
          <label><input type="radio" name="gender" value="2"checked>女</label>
          @endif
        </td>
      </tr>
      <tr>
        <th>住所</th>
        {{-- あとでDBから取る形にする --}}
        <td>
          <select name="prefecture" id="">
            @foreach ($prefectures as $item)
              @if ($item['id'] === $record['prefecture'])
              <option value="{{ $item['id'] }}" selected>{{ $item['name'] }}</option>
              @else
              <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
              @endif
            @endforeach
            </select>
        </td>
      </tr>
    </table>
    <hr>
    <button type="submit" class="btn btn-primary">変更</button>
    <a href="/user/my" class="btn btn-secondary">マイページに戻る</a>

  </form>

</div>
@stop