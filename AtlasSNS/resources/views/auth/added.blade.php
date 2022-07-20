@extends('layouts.logout')

@section('content')

<div id="clear">
  <p class="login-title">{{ Session::get('username') }}さん<br>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。<br>早速ログインをしてみましょう。</p>

  <p class="btn btn-danger"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
