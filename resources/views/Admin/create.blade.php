<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- tailwind_css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- css_file -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @livewireStyles
</head>

<body>
    <a href="{{ route('dashboard') }}"><x-button>戻る</x-button></a>

    <main class="mt-12 p-4">
        <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p>ショップ名</p>
            <input type="text" name="shop_name">

            <p>ロゴ</p>
            <input type="file" name="logo">

            <p>カバー画像</p>
            <input type="file" name="cover">

            <p>WebサイトURL</p>
            <input type="text" name="url"><br>

            <x-button class="mt-6">登録</x-button>
        </form>
    </main>

    <!-- jquery,main.js 読み込み -->
    <x-readjs />

    @livewireScripts
</body>

</html>
