<!DOCTYPE html>
<html lang="ja">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Divee</title>

</head>
<body>
    {{-- タイトル画面 --}}

    {{-- ロゴマークの読み込み --}}
    <div class=" flex justify-center content-center">

        <div>
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </div>

        {{-- ログインリンク --}}
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>

    </div>
        {{-- 新規登録リンク --}}
    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">新規登録はこちら</a>

</body>
</html>
