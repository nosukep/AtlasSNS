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

        <table>
        @foreach ($lists as $list)
          <tr>
              <td class="user-icon"><img src={{ $list->user->images }} alt="プロフィール画像"></td>
              <!-- usersテーブルの情報を取得するにはPostモデルで定義しているuserメソッドを経由してusersテーブルの情報を取得する必要がある。 -->
              <td>{{ $list->user->username }}</td>
              <td>{{ $list->post }}</td>
              <td>{{ $list->created_at }}</td>
              <td><a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="/storage/images/edit.png" alt="編集"></a></td>
              <!-- <td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form"><img src="/storage/images/edit.png" alt="編集"></a></td> -->
              <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="/storage/images/trash.png" alt="削除"></a></td>
          </tr>
        @endforeach
        <!-- モーダルの中身 -->
        <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="post/update" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
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
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
        </table>
    </div>


@endsection
