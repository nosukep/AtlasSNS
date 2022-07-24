@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/login']) !!}

<p class="login-title">AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}<br>
{{ Form::text('mail',null,['class' => 'input']) }}<br>
{{ Form::label('password') }}<br>
{{ Form::password('password',['class' => 'input']) }}

@if ($errors->all())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

{{ Form::submit('ログイン',['class' => 'btn btn-danger']) }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
