@extends('layouts.login')

@section('content')

<div class="container">
  <div class="my-profile-wrapper">
      <div class="user-icon">
        <img src={{ Auth::user()->images }} alt="プロフィール画像">
      </div>

      {!! Form::open(['url' => '/my-profile', 'enctype' => 'multipart/form-data']) !!}

      {!! Form::hidden('id', Auth::user()->id) !!}
    @csrf
    {{ Form::label('username', 'ユーザー名') }}
    <!-- ↑ label('name属性','ラベル表示名') -->
    {{ Form::text('username',Auth::user()->username,['class' => 'input']) }}
    @if($errors->has('username'))
      <div class="alert alert-danger">
      <ul>
          @foreach ($errors->get('username') as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      </div>
    @endif

    {{ Form::label('mail', 'メールアドレス') }}
    {{ Form::text('mail',Auth::user()->mail,['class' => 'input']) }}
    @if($errors->has('mail'))
      <div class="alert alert-danger">
      <ul>
          @foreach ($errors->get('mail') as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      </div>
    @endif

    {{ Form::label('password', 'パスワード') }}
    {{ Form::password('password',null,['class' => 'input']) }}
    @if($errors->has('password'))
      <div class="alert alert-danger">
      <ul>
          @foreach ($errors->get('password') as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      </div>
    @endif

    {{ Form::label('password_confirmation','パスワード確認') }}
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}

    {{ Form::label('bio', '自己紹介文') }}
    {{ Form::text('bio',Auth::user()->bio,['class' => 'input']) }}
    @if($errors->has('bio'))
      <div class="alert alert-danger">
      <ul>
          @foreach ($errors->get('bio') as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      </div>
    @endif

    {{ Form::label('images', 'プロフィール画像') }}
    {{ Form::file('images',null,['class' => 'input-file', 'accept' => 'image/jpeg, image/png']) }}
    @if($errors->has('images'))
      <div class="alert alert-danger">
      <ul>
          @foreach ($errors->get('images') as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      </div>
    @endif

    <div class="my-profile-btn">
      {{ Form::submit('更新', ['class' => 'btn btn-danger']) }}
    </div>

    {!! Form::close() !!}
  </div>
</div>

@endsection
