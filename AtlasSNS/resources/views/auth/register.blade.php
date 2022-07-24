@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}

<p class="login-title">新規ユーザー登録</p>



{{ Form::label('username','ユーザー名') }}
{{ Form::text('username',null,['class' => 'input','placeholder' => 'username']) }}
    @if($errors->has('username'))
      <div class="alert alert-danger">
      <ul>
          @foreach ($errors->get('username') as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      </div>
    @endif

{{ Form::label('mail','メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input','placeholder' => 'mail@address.com']) }}
    @if($errors->has('mail'))
      <div class="alert alert-danger">
      <ul>
          @foreach ($errors->get('mail') as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      </div>
    @endif

{{ Form::label('password','パスワード') }}
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

{{ Form::submit('登録',['class' => 'btn btn-danger']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
