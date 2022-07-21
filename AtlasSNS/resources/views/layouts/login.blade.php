<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <!-- bootstrap適用 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="/storage/images/atlas.png" sizes="16x16" type="image/png" />
    <link rel="icon" href="/storage/images/atlas.png" sizes="32x32" type="image/png" />
    <link rel="icon" href="/storage/images/atlas.png" sizes="48x48" type="image/png" />
    <link rel="icon" href="/storage/images/atlas.png" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <!-- fontawesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img class="site-logo" src="/storage/images/atlas.png" alt="サイトロゴ"></a></h1>
        <!-- img src="{{ asset('storage/images/atlas.png') }}"でも可 -->
        <!-- ↑ターミナルからシンボリックリンクの設定が必要 -->
            <div class="accordion">
                <div class="menu" onclick="toggle()">
                <div class="menu-box">
                <!-- ↓Authファザードでログイン中のユーザー情報の中のusernameを取得 -->
                <p>{{ Auth::user()->username }}さん<span class="accordion-arrow"></span></p>
                <img class="accordion-icon" src={{ Auth::user()->images }}  alt="プロフィール画像">
                </div>
                <div>
                <ul class="menu-list">
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/my-profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="username">{{ Auth::user()->username }}さんの</p>
                <div>
                <p class="count">フォロー数</p>
                <p class="count">{{ Auth::user()->follows()->get()->count() }}名</p>
                </div>
                <div class="sidebar-btn">
                <a class="btn btn-primary" href="/follow-list">フォローリスト</a>
                </div>
                <div>
                <p class="count">フォロワー数</p>
                <p class="count">{{ Auth::user()->followers()->get()->count() }}名</p>
                </div>
                <div class="sidebar-btn">
                <a class="btn btn-primary" href="/follower-list">フォロワーリスト</a>
                </div>
            </div>
            <a class="btn btn-primary search-btn" href="/search">ユーザー検索</a>
        </div>
    </div>
    <footer>
    </footer>
    <!-- bootstrap適用　自分で追加するscriptよりも前に記載しなければ優先順位が変わるので注意 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="JavaScriptファイルのURL"></script>
    <script src="{{ asset('/js/accordion.js' ) }}"></script>
    <script src="{{ asset('/js/modal.js' ) }}"></script>


</body>
</html>
