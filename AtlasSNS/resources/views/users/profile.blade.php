@extends('layouts.login')

@section('content')

<div class="container">
  <div class="user-icon">
    <img src={{ Auth::user()->images }} alt="プロフィール画像">
  </div>

  {!! Form::open(['url' => '/profile', 'enctype' => 'multipart/form-data']) !!}
  @if($errors->any())
  <div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
  </div>
  @endif

{!! Form::hidden('id', Auth::user()->id) !!}
 @csrf
{{ Form::label('username', 'ユーザー名') }}
<!-- ↑ label('name属性','ラベル表示名') -->
{{ Form::text('username',Auth::user()->username,['class' => 'input']) }}

{{ Form::label('mail', 'メールアドレス') }}
{{ Form::text('mail',Auth::user()->mail,['class' => 'input']) }}

{{ Form::label('password', 'パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}

{{ Form::label('password_confirmation','パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

{{ Form::label('bio', '自己紹介文') }}
{{ Form::text('bio',Auth::user()->bio,['class' => 'input']) }}

{{ Form::label('imgpath', 'プロフィール画像') }}
{{ Form::file('imgpath',null,['class' => 'file', 'accept' => 'image/jpeg, image/png']) }}

{{ Form::submit('更新') }}

{!! Form::close() !!}
</div>

@endsection
