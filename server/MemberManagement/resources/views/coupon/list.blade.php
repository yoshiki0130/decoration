@extends('layout/layout')
@section('content')
<div>
  <h1>クーポン一覧</h1>
  <div>
    <table class="table">
      @foreach ($data as $item)
          <tr>
            <td>{{$item['title']}}</td>
            <td>{{$item['content']}}</td>
            <td>有効期限：{{date('Y/m/d', strtotime($item['expiration_date']))}}</td>
          </tr>
      @endforeach
    </table>
  </div>
</div>
<a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">マイページに戻る</a>

@stop