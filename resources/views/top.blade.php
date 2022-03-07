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

</head>
<body>
    {{-- ロゴマークの読み込み --}}
    <div class="bg-blue-500">
        {{-- wrapper --}}
        <div class="bg-blue-600 w-11/12 mr-auto ml-auto">

            <div>
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>

            {{-- ログインリンク --}}
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>


            {{-- 新規登録リンク --}}
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">新規登録はこちら</a>

        </div>{{-- wrapperここまで --}}
    </div>


</body>
</html>
