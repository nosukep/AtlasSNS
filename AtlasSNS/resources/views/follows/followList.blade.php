@extends('layouts.login')

@section('content')

<div id="follow-list-images">
  <h1>Follow List</h1>
  <ul class="follow-images">
    @foreach ($lists as $list)
    <li><a href="/profile/{{$list->id}}"><img src={{ $list->images }} alt="プロフィール画像{{ $list->id }}"></a></li>
    @endforeach
  </ul>
</div>

<div id="follow-list-posts">
 <ul class="content">
    @foreach ($posts as $post)
    @if (auth()->user()->isFollowing($post->user->id))
    <li>
      <div class="user-icon">
        <a href="/profile/{{$post->user->id}}"><img src="{{ $post->user->images }}" alt="プロフィール画像"></a>
      </div>
      <div class="posts-main">
        <div class="posts-username">{{ $post->user->username }}</div>
        <div class="posts-content">{{ $post->post }}</div>
      </div>
      <div class="created-at">{{ $post->created_at->format('Y-m-d H:m') }}</div>
    </li>
    @endif
    @endforeach
 </ul>
</div>


@endsection
