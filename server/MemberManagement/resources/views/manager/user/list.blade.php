@if (isset($userlist) && count($userlist) > 0)
<table class="table">
  <tr>
    <th>ユーザ名</th>
    <th>性別</th>
    <th>住所</th>
    <th>登録日</th>
  </tr>
  @foreach ($userlist as $user)
  <tr>
    <td>
      <a href="/manager/userdetail/{{ $user['id'] }}">
        {{ $user['name1'] . $user['name2'] }}
      </a>
      <input type="hidden" name="user_id[]" value="{{ $user['id'] }}">
    </td>
    <td>{{ $user['gender_name'] }}</td>
    <td>{{ $user['prefecture_name'] }}</td>
    <td>{{ date('Y/m/d', strtotime($user['created_at'])) }}</td>
  </tr>
  @endforeach
</table>
@else
<p>
  該当する会員はいませんでした。
</p>
@endif
