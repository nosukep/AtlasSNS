@extends('layouts.login')

@section('content')


@foreach ($users as $user)
  <div class="profile">
      <div class="user-icon">
        <img src={{ $user->images }} alt="プロフィール画像">
      </div>
      <div class="profile-content-wrapper">
        <div class="profile-content">
          <p class="profile-content-title">name</p>
          <p>{{ $user->username }}</p>
        </div>
        <div  class="profile-content">
          <p class="profile-content-title">bio</p>
          <p>{{ $user->bio }}</p>
        </div>
      </div>
      @if (auth()->user()->isFollowing($user->id))
        <div class="follow-btn">
          <form action="/unfollow" method="post" class="unfollow-btn">
          <input type="hidden" name="unfollowing_id" class="unfollowing_id" value="{{ $user->id }}">
          <input type="submit" class="btn btn-danger" value="フォロー解除">
          {{ csrf_field() }}
          </form>
        </div>
        @else
        <div class="follow-btn">
          <form action="/follow" method="post" class="">
          <input type="hidden" name="following_id" class="following_id" value="{{ $user->id }}">
          <input type="submit" class="btn btn-primary" value="フォローする">
          {{ csrf_field() }}
          </form>
        </div>
      @endif
  </div>
  @endforeach

<div id="follow-list-posts">
  <ul class="content">
  @foreach ($posts as $post)
  <li>
    <div class="user-icon">
      <img src={{ $post->user->images }} alt="プロフィール画像">
    </div>
    <div class="posts-main">
      <div class="posts-username">{{ $post->user->username }}</div>
      <div class="posts-content">{{ $post->post }}</div>
    </div>
    <div class="created-at">{{ $post->created_at->format('Y-m-d H:m') }}</div>
  </li>
  @endforeach
  </ul>
</div>

@endsection
