@extends('layout/manager')
@section('content')
  <div>
    <h1>会員詳細</h1>
    <table>
      <tr>
        <th>ID</th>
        <td>{{ $data['id'] }}</td>
      </tr>
      <tr>
        <th>名前</th>
        <td>{{ $data['name1'] . ' ' . $data['name2'] }}</td>
      </tr>
      <tr>
        <th>フリガナ</th>
        <td>{{ $data['kana1'] . ' ' . $data['kana2'] }}</td>
      </tr>
      <tr>
        <th>パスワード</th>
        <td>{{ $data['password'] }}</td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $data['email'] }}</td>
      </tr>
      <tr>
        <th>性別</th>
        <td>{{ $data->gender->name }}</td>
      </tr>
      <tr>
        <th>住所</th>
        <td>{{ $data->prefecture->name }}</td>
      </tr>
      <tr>
        <th>登録日</th>
        <td>{{ date('Y/m/d', strtotime($data['created_at'])) }}</td>
      </tr>
    </table>
    <hr>
    <button onclick="history.back()" class="btn btn-secondary">戻る</button>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal">削除</button>
    {{-- モーダルウィンドウ --}}
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">
              削除確認
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            本当に削除しますか？
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
            <form action="/manager/userdelete" method="post">
              @csrf
              <input type="hidden" name="id" value="{{ $data['id'] }}">
              <button type="submit" class="btn btn-danger">削除</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
