<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
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
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img class="site-logo" src="/storage/images/atlas.png" alt="サイトロゴ"></a></h1>
        <!-- img src="{{ asset('storage/images/atlas.png') }}"でも可 -->
        <!-- ↑ターミナルからシンボリックリンクの設定が必要 -->
            <div class="accordion">
                <div class="menu" onclick="toggle()">
                <!-- ↓Authファザードでログイン中のユーザー情報の中のusernameを取得 -->
                <p>{{ Auth::user()->username }}さん<span class="accordion-arrow"></span><img class="accordion-icon" src={{ Auth::user()->images }}  alt="プロフィール画像"></p>
                <div>
                <ul class="menu-list">
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
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
                <p>〇〇さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="JavaScriptファイルのURL"></script>
    <script src="{{ asset('/js/accordion.js' ) }}"></script>
    <script src="{{ asset('/js/modal.js' ) }}"></script>
</body>
</html>
