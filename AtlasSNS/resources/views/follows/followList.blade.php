@extends('layouts.login')

@section('content')

<div id="follow-list-images">
  <h1>Follow List</h1>
  <ul class="follow-images">
    @foreach ($lists as $list)
    <li>{{ $list->username }}</li>
    <li><a href=""><img src={{ $list->images }} alt="プロフィール画像{{ $list->id }}"></a></li>
    @endforeach
  </ul>
</div>

<div id="follow-list-posts">
 <table>
        @foreach ($posts as $post)
        @if (auth()->user()->isFollowing($post->user->id))
          <tr>
              <td class="user-icon"><img src="{{ $post->user->images }}" alt=""></td>
              <td class="">{{ $post->user->username }}</td>
              <td class="">{{ $post->post }}</td>
              <td class="">{{ $post->created_at }}</td>
          </tr>
        @endif
        @endforeach
</table>
</div>


@endsection
