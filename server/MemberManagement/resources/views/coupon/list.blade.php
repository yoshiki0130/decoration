@extends('layout/'.$mode)
@section('content')
<div>
  @if (Session::has('message'))
  <p>{{ session('message') }}</p>
  @endif
</div>
<div>
  <h1>クーポン管理</h1>
  @if ($mode === 'manager')
  <div>
    <a href="/manager/coupon/registration" class="btn btn-success">クーポン作成</a>
  </div>
  @endif
  <div>
    <table class="table">
      <tr>
        <th>クーポンタイトル</th>
        <th>配布人数</th>
        <th>有効期限</th>
      </tr>
      @foreach ($data as $item)
      <tr>
        <td><a href="/manager/coupon/{{ $item['id'] }}">{{$item['title']}}</a></td>
        <td></td>
        <td>{{date('Y/m/d', strtotime($item['expiration_date']))}}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">戻る</a>

@stop