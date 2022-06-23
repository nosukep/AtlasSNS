@extends('layouts.login')

@section('content')

<div class="container">
  <div class="user-icon">
    <img src={{ Auth::user()->images }} alt="プロフィール画像">
  </div>

  {!! Form::open(['url' => '/profile']) !!}

  @if($errors->any())
  <div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
  </div>
  @endif

{{ Form::label('username', 'ユーザー名') }}
<!-- ↑ label('name属性','ラベル表示名') -->
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('mail', 'メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password', 'パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}

{{ Form::label('password_confirmation','パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

{{ Form::label('bio', '自己紹介文') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<!-- {{ Form::textarea('bio', null, ['class' => 'input', 'rows' => 3,]) }} -->

{{ Form::label('images', 'プロフィール画像') }}
{{ Form::file('images',null,['class' => 'input', 'accept' => 'image/jpeg, image/png']) }}

{{ Form::submit('更新') }}

{!! Form::close() !!}
</div>

@endsection
