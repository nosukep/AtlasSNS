@extends('layouts.login')

@section('content')

  <div id="search">
      <div class="search-form-group">
          {!! Form::open(['url' => 'search']) !!}
          {!! Form::input('text', 'search', null, ['required', 'class' => 'search-form', 'placeholder' => 'ユーザー名で検索',]) !!}
      </div>
      <div class="btn">
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-search"></i></button>
          {!! Form::close() !!}
      </div>
      <a href="/search">一覧に戻る</a>
  </div>

          <table>
        @foreach ($lists as $list)
          <tr>
              <td class="user-icon"><img src={{ $list->images }} alt="プロフィール画像"></td>
              <td>{{ $list->username }}</td>
          </tr>
        @endforeach
        </table>

@endsection
