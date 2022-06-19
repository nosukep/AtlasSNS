@extends('layouts.login')

@section('content')
    <div class="container">
        <div calss="user-icon">
            <p>
                <img src={{ Auth::user()->images }} alt="プロフィール画像">
            </p>
        </div>
        <div class="post-form">
        {!! Form::open(['url' => 'top']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'post-form', 'placeholder' => '投稿内容を入力してください']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right"></button>
        {!! Form::close() !!}
        </div>

        <table>
        @foreach ($lists as $list)
          <tr>
              <td>{{ $list->images }}</td>
              <td>{{ $list->username }}</td>
              <td>{{ $list->post }}</td>
              <td>{{ $list->created_at }}</td>
              <td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form">更新</a></td>
              <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
          </tr>
        @endforeach
        </table>
    </div>


@endsection
