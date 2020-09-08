@extends('layout/manager')
@section('content')
@section('title', 'クーポン詳細')
  <div>
    <h1>クーポン詳細</h1>
    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">戻る</a>
    @if($mode === 'manager')
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal">削除</button>
    @endif
    <div>
      <table class="table">
        <tr>
          <th>クーポンタイトル</th>
          <td>
            {{ $data['title'] }}
          </td>
        </tr>
        <tr>
          <th>内容</th>
          <td>
            {{ $data['content'] }}
          </td>
        </tr>
        <tr>
          <th>有効期限</th>
          <td>
            {{ date('Y/m/d', strtotime($data['expiration_date'])) }}
          </td>
        </tr>
        @if($mode === 'manager')
          <tr>
            <th>クーポンを配布する会員</th>
            <td>
              @include('layout/parts/userlist')
            </td>
          </tr>
        @endif
      </table>
    </div>
    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">戻る</a>
    @if($mode === 'manager')
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
              <form action="/manager/coupon/delete" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $data['id'] }}">
                <button type="submit" class="btn btn-danger">削除</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
@stop
