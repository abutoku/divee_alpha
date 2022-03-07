<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Divee</title>

    <!-- tailwind_css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- tailwind_file -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

</head>
<body>
    {{-- 全体の背景色 --}}
    <div class="bg-paper h-[1800px]">

    <!-- ハンバーガーメニュー -->
    <div id="menu_contents" class="bg-paper z-20 w-[320px] h-[800px] absolute">

        <div>
            <p>アカウント</p>
        </div>

        <div>
            <ul>

                <a href=#">
                    <li>プロフィール</li>
                </a>

                <a href="#">
                    <li>写真一覧</li>
                </a>

                <li>設定</li>
                <li>ヘルプ</li>
            </ul>

            <!-- ログアウトボタン -->
            <div>ログアウト</div>

        </div>
    </div>
    <!-- menu_contentsここまで -->

    <!-- ハンバーガーメニューの背景 -->
    <div id="mask" class="w-full h-full fixed bg-black bg-opacity-50 z-10">
        <!-- クローズボタン -->
        <div class="absolute left-[350px]">
            <svg class="h-12 w-12 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="11 7 6 12 11 17" />  <polyline points="17 7 12 12 17 17" /></svg>
        </div>
    </div>

        <header class="w-full h-10 fixed border-b border-gray-300 bg-paper">
            <div id="hamburger">
                <svg class="h-8 w-8 text-gray-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="6" x2="20" y2="6" />  <line x1="4" y1="12" x2="20" y2="12" />  <line x1="4" y1="18" x2="20" y2="18" /></svg>
            </div>
        </header>

        {{-- wrapper --}}
        <div class="p-6">
            <section class="flex mt-8 mb-8">
                <div>HOME</div>
                <div>タイムライン</div>
            </section>

            <section class="mb-6">
                <h1>infomation</h1>
            </section>

            <section>

                <div class="flex">
                    <div>マイページ</div>
                    <div>生物ログ</div>
                </div>

                <div class="flex">
                    <div>Map</div>
                    <div>海情報</div>
                </div>

                <div class="flex">
                    <div>図鑑</div>
                    <div>QRコード</div>
                </div>

                <div>
                    <div>記事作成</div>
                </div>

            </section>

        </div>{{-- wrapperここまで --}}
    </div>

<!-- jquery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- main.js読み込み -->
    <script src="{{ mix('js/main.js') }}"></script>



</body>
</html>
