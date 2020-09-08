@extends('layout/user')
@section('content')
@section('title', '日記一覧')
<div>
  <h1>日記一覧</h1>
  <div>

  @if (Session::has('message'))
      <p>{{ session('message') }}</p>
  @endif

    <table class="table">
      @foreach ($data as $item)
          <tr>
          <td>
            <form method="post" name="diary<? echo $item->id; ?>" action="/user/diary/details">
            @csrf
            <input type="hidden" name="user_id" value="<? echo $item->id; ?>">
            <input type="hidden" name="loginuser_id" value="{{ session('id') }}">
            <a href="javascript:void(0)" onclick="document.diary<? echo $item->id; ?>.submit()"><? echo $item->title; ?></a>
            </form>
          </td>
          </tr>
      @endforeach
    </table>
  </div>
</div>
<a href="/user/top" class="btn btn-secondary">マイページに戻る</a>

@stop