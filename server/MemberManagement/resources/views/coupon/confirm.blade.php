@extends('layout/manager')
@section('content')
@section('title', 'クーポン作成')
<div>
  <h1>クーポン作成</h1>
  <div>
    <form action="/manager/coupon/store" method="post">
      @csrf
      <table class="table">
        <tr>
          <th>クーポンタイトル</th>
          <td>
            {{ $input['title'] }}
            <input type="hidden" name="title" value="{{ $input['title'] }}">
          </td>
        </tr>
        <tr>
          <th>内容</th>
          <td>
            {{ $input['content'] }}
            <input type="hidden" name="content" value="{{ $input['content'] }}">
          </td>
        </tr>
        <tr>
          <th>有効期限</th>
          <td>
            {{ $input['expiration_date'] }}
            <input type="hidden" name="expiration_date" value="{{ $input['expiration_date'] }}">
          </td>
        </tr>
        <tr>
          <th>クーポンを配布する会員</th>
          <td>
            @include('layout/parts/userlist')
          </td>
        </tr>
      </table>
  </div>
  <button type="submit" class="btn btn-primary">登録</button>
  <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">内容を修正する</a>
  </form>
</div>


@stop