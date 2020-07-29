@extends('layout/'.$mode)
@section('content')
  <div>
    <h1>クーポン管理</h1>
    @if($mode === 'manager')
      <div>
        <a href="/manager/coupon/registration" class="btn btn-success">クーポン作成</a>
      </div>
    @endif
    <div>
      <table class="table">
        <tr>
          <th>クーポンタイトル</th>
          @if($mode === 'manager')
            <th>配布人数</th>
          @endif
          <th>有効期限</th>
        </tr>
        @foreach($data as $item)
          <tr>
            <td>
              @if($mode === 'manager')
                <a href="/manager/coupon/{{ $item['id'] }}">{{ $item['title'] }}</a>
              @else
                <a href="/user/coupon/{{ $item['id'] }}">{{ $item['title'] }}</a>
              @endif
            </td>
            @if($mode === 'manager')
              <td>{{ $item['distributuion_count'] }}</td>
            @endif
            <td>{{ date('Y/m/d', strtotime($item['expiration_date'])) }}</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
  <a href="/{{ $mode }}/top" class="btn btn-secondary">戻る</a>

@stop
