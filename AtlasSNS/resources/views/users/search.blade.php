@extends('layouts.login')

@section('content')
<div id="search">
  <div class="search-content">
    <div>
      <div class="search-form-group">
          {!! Form::open(['url' => 'search']) !!}
          {!! Form::input('text', 'search', request('search'), ['required', 'class' => 'search-form', 'placeholder' => 'ユーザー名で検索',]) !!}
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
          </div>
          {!! Form::close() !!}
    </div>
    <div class="search-result">
      @if(!empty($username))
      {{ $username }}の検索結果
      @endif
      <a href="/search">一覧に戻る</a>
    </div>
  </div>

        <ul class="content">
          @foreach ($lists as $list)
          <li>
            <div class="search-wrapper">
              <div class="user-icon"><a href="/profile/{{$list->id}}"><img src="{{ $list->images }}" alt=""></a></div>
              <div class="user-name">{{ $list->username }}</div>
              <!-- ログインユーザーがisFollowingメソッドを使って各ユーザーをフォローしているかどうかを判断してボタンの表示を切り替える。 -->
              <!-- 「auth()->user()」はauthヘルパーの記述方法。「Auth::user()」（authファザード）と同義 -->
              @if (auth()->user()->isFollowing($list->id))
              <div class="btn">
                <form action="unfollow" method="post" class="unfollow-btn">
                <input type="hidden" name="unfollowing_id" class="unfollowing_id" value="{{ $list->id }}">
                <input type="submit" class="btn btn-danger" value="フォロー解除">
                {{ csrf_field() }}
                </form>
              </div>
              @else
              <div  class="btn">
                <form action="follow" method="post" class="follow-btn">
                <input type="hidden" name="following_id" class="following_id" value="{{ $list->id }}">
                <input type="submit" class="btn btn-primary" value="フォローする">
                {{ csrf_field() }}
                </form>
              </div>
              @endif
            </div>
          </li>

          @endforeach
        </ul>
</div>
@endsection
