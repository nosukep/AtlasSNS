@extends('layouts.login')

@section('content')

<table>
  @foreach ($users as $user)
  <tr>
      <td class="user-icon"><img src={{ $user->images }} alt="プロフィール画像"></td>
      <td>name</td>
      <td>{{ $user->username }}</td>
      <td>bio</td>
      <td>{{ $user->bio }}</td>
      @if (auth()->user()->isFollowing($user->id))
        <td>
          <form action="/unfollow" method="post" class="unfollow-btn">
          <input type="hidden" name="unfollowing_id" class="unfollowing_id" value="{{ $user->id }}">
          <input type="submit" value="フォロー解除">
          {{ csrf_field() }}
          </form>
        </td>
        @else
        <td>
          <form action="/follow" method="post" class="follow-btn">
          <input type="hidden" name="following_id" class="following_id" value="{{ $user->id }}">
          <input type="submit" value="フォローする">
          {{ csrf_field() }}
          </form>
        </td>
      @endif
  </tr>
  @endforeach
</table>

<table>
  @foreach ($posts as $post)
  <tr>
      <td class="user-icon"><img src={{ $post->user->images }} alt="プロフィール画像"></td>
      <td>{{ $post->user->username }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
  </tr>
  @endforeach
</table>

@endsection
