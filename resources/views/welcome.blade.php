<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Divee</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

    <style>

    /* 背景色 */
    body {
        background-color: #015DC6;
    }
    .main {
        height: 1200px;
    }
    /* リンクのスタイルを初期化 */
    a:link,
    a:visited,
    a:hover,
    a:active {
        text-decoration: none;
        color: white;
    }
    .wrapper {
        padding-top:80px;
        width: 90%;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .top-contents{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width:200px;
    }
    .btn-area {
        margin-top: 120px;
        display: flex;
        justify-content: center;
    }

    .top-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 200px;
        height:60px;
        border-radius: 10px;
        margin-bottom: 24px;
        background-color:white;
    }
    .sigin-in {
        color:white;
        text-decoration:underline;
        margin-left:auto;
    }
    </style>

</head>
<body>

    {{-- 全体の背景 --}}
    <div class="main">
        {{-- wrapper --}}
        <div class="wrapper">

            {{-- ロゴマークの読み込み --}}
            <div>
                <x-application-logo/>
            </div>

            <div class="top-contents">

                {{-- ログインボタン部分 --}}
                @auth
                {{-- すでにログイン済みであればHOMEへ --}}
                <div class="btn-area">
                    <a href="{{ url('/dashboard') }}" class="top-btn" style="color:#015DC6;">
                        HOMEへ
                    </a>
                </div>
                @else
                {{-- ログインリンク --}}
                <div class="btn-area">
                    <a href="{{ route('login') }}" class="top-btn" style="color:#015DC6;">
                        ログイン
                    </a>
                </div>
                {{-- 新規登録リンク --}}
                <div class="sigin-in">
                    <a href="{{ route('register') }}">新規登録はこちら</a>
                </div>
                @endauth
            </div>
            <a href="/funmap">Map</a>
        </div>
        {{-- wrapperここまで --}}
     </div>
    {{-- 全体ここまで --}}
</body>
</html>
