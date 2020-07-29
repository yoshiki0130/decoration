@extends('layout/manager')
@section('content')
  <div>
    <h1>クーポン詳細</h1>
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
              @include('manager/parts/userlist')
            </td>
          </tr>
        @endif
      </table>
    </div>
    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">戻る</a>
  </div>


@stop
