@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="post">
            <div class="user-icon">
                <img src={{ Auth::user()->images }} alt="プロフィール画像">
            </div>
            <div class="form-group">
                {!! Form::open(['url' => 'top']) !!}
                {!! Form::textarea('newPost', null, ['required', 'class' => 'post-form', 'placeholder' => '投稿内容を入力してください', 'rows' => 3,]) !!}
            </div>
            <div class="form-btn">
                <button type="submit" class="btn btn-success pull-right"><img src="/storage/images/post.png" alt="送信"></button>
                {!! Form::close() !!}
            </div>
        </div>

        @if($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $errors->first('newPost') }}</li>
            @endforeach
        </ul>
        </div>
        @endif

        <ul class="content">
        @foreach ($lists as $list)
          <li>
               @if ($list->user->id == Auth::user()->id)
               <div class="user-icon"><a href="/my-profile"><img src={{ $list->user->images }} alt="プロフィール画像"></a></div>
               @else
               <div class="user-icon"><a href="/profile/{{$list->user->id}}"><img src={{ $list->user->images }} alt="プロフィール画像"></a></div>
               @endif
              <!-- usersテーブルの情報を取得するにはPostモデルで定義しているuserメソッドを経由してusersテーブルの情報を取得する必要がある。 -->
              <div class="posts-main">
              <div class="posts-username">{{ $list->user->username }}</div>
              <div class="posts-content">{{ $list->post }}</div>
              </div>
              <div class="created-at">{{ $list->created_at->format('Y-m-d H:m') }}
              @if ($list->user->id == Auth::user()->id)
              <!-- <td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form"><img src="/storage/images/edit.png" alt="編集"></a></td> -->
              <div><a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="/storage/images/edit.png" alt="編集"></a>
              <a class="" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="/storage/images/trash.png" alt="削除"></a></div>
              @endif
              </div>
          </li>
        @endforeach
        <!-- モーダルの中身 -->
        <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <form action="post/update" method="post">
                    <textarea name="upPost" class="modal_post" rows="10"></textarea>
                    <input type="hidden" name="id" class="modal_id" value="">
                    <input type="image" name="submit" src="/storage/images/edit.png" value="更新" width="40">
                    {{ csrf_field() }}
                </form>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $errors->first('upPost')}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>

        </ul>
    </div>


@endsection
