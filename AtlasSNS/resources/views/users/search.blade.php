@extends('layouts.login')

@section('content')

  <div id="search">
      <div class="search-form-group">
          {!! Form::open(['url' => 'search']) !!}
          {!! Form::input('text', 'search', request('search'), ['required', 'class' => 'search-form', 'placeholder' => 'ユーザー名で検索',]) !!}
      </div>
      <div class="btn">
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-search"></i></button>
          {!! Form::close() !!}
      </div>
      <a href="/search">一覧に戻る</a>
      @if(!empty($username))
      {{ $username }}の検索結果
      @endif
  </div>

        <table>
          @foreach ($lists as $list)
          <tr>
              <td class="user-icon"><a href="/profile/{{$list->id}}"><img src="{{ $list->images }}" alt=""></a></td>
              <td>{{ $list->username }}</td>
              <!-- ログインユーザーがisFollowingメソッドを使って各ユーザーをフォローしているかどうかを判断してボタンの表示を切り替える。 -->
              <!-- 「auth()->user()」はauthヘルパーの記述方法。「Auth::user()」（authファザード）と同義 -->
              @if (auth()->user()->isFollowing($list->id))
              <td>
                <form action="unfollow" method="post" class="unfollow-btn">
                <input type="hidden" name="unfollowing_id" class="unfollowing_id" value="{{ $list->id }}">
                <input type="submit" value="フォロー解除">
                {{ csrf_field() }}
                </form>
              </td>
              @else
              <td>
                <form action="follow" method="post" class="follow-btn">
                <input type="hidden" name="following_id" class="following_id" value="{{ $list->id }}">
                <input type="submit" value="フォローする">
                {{ csrf_field() }}
                </form>
              </td>
              @endif
          </tr>
          @endforeach
        </table>

@endsection
