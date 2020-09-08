@extends('layout/manager')
@section('title', 'クーポン作成')
@section('content')
<div>
  <h1>クーポン作成</h1>
  <div>
    <form action="/manager/coupon/confirm" method="post">
      @csrf
      <table class="table">
        <tr>
          <th>クーポンタイトル</th>
          <td>
            <input type="text" name="title">
          </td>
        </tr>
        <tr>
          <th>内容</th>
          <td>
            <textarea name="content" cols="30" rows="10"></textarea>
          </td>
        </tr>
        <tr>
          <th>有効期限</th>
          <td>
            <input type="date" name="expiration_date">
          </td>
        </tr>
        <tr>
          <th>クーポンを配布する会員</th>
          <td>
            @include('layout/parts/usersearch')
          </td>
        </tr>
      </table>
  </div>
  <button type="submit" class="btn btn-primary">確認</button>
  <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">戻る</a>
  </form>
</div>


@stop