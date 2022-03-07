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
    <div>

        <header class="fixed bg-paper">
            <div>
                <svg class="h-8 w-8 text-gray-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="21" y1="10" x2="3" y2="10" />  <line x1="21" y1="6" x2="3" y2="6" />  <line x1="21" y1="14" x2="3" y2="14" />  <line x1="21" y1="18" x2="3" y2="18" /></svg>
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

        </div>
        {{-- wrapperここまで --}}
    </div>

    <script>

    </script>
</body>
</html>
