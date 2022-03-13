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
    .main {
        background-color: #015DC6;
        height: 1200px;
    }
    .wrapper {
        padding-top:80px;
        width: 90%;
        margin: 0 auto;
    }
    .top-logo {
        display: flex;
        justify-content: center;
    }

    .sigin-in {
        display: flex;
        justify-content: center;
        text-color:white;
    }
    
    </style>

</head>
<body>

    {{-- 全体の背景 --}}
    <div class="main">
        {{-- wrapper --}}
        <div class="wrapper">

            {{-- ロゴマークの読み込み --}}
            <div class="top-logo">
                <x-application-logo/>
            </div>

            {{-- ログインボタン部分 --}}
                @auth
                {{-- すでにログイン済みであればHOMEへ --}}
                <div class="mt-24 flex justify-center">
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 no-underline">
                    <div class="mb-4  text-diveblue bg-white w-[200px] h-12 rounded-xl flex justify-center items-center">HOMEへ</div>
                    </a>
                </div>
                @else
                {{-- ログインリンク --}}
                    <div class="mt-24 flex justify-center">
                        <a href="{{ route('login') }}">
                            <div class="mb-4  text-diveblue bg-white w-[200px] h-12 rounded-xl flex justify-center items-center">ログイン</div>
                        </a>
                    </div>
                {{-- 新規登録リンク --}}
                    <div class="sigin-in">
                        <a href="{{ route('register') }}" class="dark:text-gray-500 underline">
                        新規登録はこちら</a>
                    </div>
                @endauth
        </div>
        {{-- wrapperここまで --}}
    </div>
    {{-- 全体ここまで --}}
</body>
</html>
