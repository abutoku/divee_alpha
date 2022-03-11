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
    <div class="bg-paper min-h-[1000px]">

        <!-- ハンバーガーメニュー -->
        <div id="menu_contents" class="bg-paper w-[320px] min-h-[1000px] absolute p-8 z-40">
            <div>
                <!-- ユーザー名表示 -->
                <a href="{{ route('profile.show', Auth::user()->id ) }}" class="flex justify-center items-center mt-10">
                <img src="{{ Storage::url(Auth::user()->profile->profile_image) }}"
                    class="h-16 w-16 rounded-full object-cover bg-white mr-4">
                <div>{{ Auth::user()->name }}</div>
                </a>
            </div>

            <div class="mt-12">
                <ul>

                    <a href="{{ route('profile.index') }}">
                        <li class="mb-6">メンバー一覧</li>
                    </a>

                    <a href="#">
                        <li class="mb-6">ランキング</li>
                    </a>

                    <a href="{{ route('profile.edit',Auth::user()->profile->id) }}">
                        <li class="mb-6">プロフィール画像変更</li>
                    </a>

                    <a href="#">
                        <li class="mb-6">プロフィール編集</li>
                    </a>

                    <a href="#">
                        <li class="mb-6">設定</li>
                    </a>

                    <a href="#">
                        <li class="mb-6">ヘルプ</li>
                    </a>

                </ul>
                <!-- ログアウトボタン -->
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
                    @csrf

                    <x-button class="w-40 h-12 flex justify-center mt-12" :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('ログアウト') }}
                    </x-button>
                </form>
            </div>
        </div>
        <!-- menu_contentsここまで -->

        <!-- ハンバーガーメニューの背景 -->
        <div id="mask" class="w-full h-full fixed bg-black bg-opacity-50 z-30">
            <!-- クローズボタン -->
            <div class="absolute left-[350px]">
                <svg class="h-12 w-12 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <polyline points="11 7 6 12 11 17" />
                    <polyline points="17 7 12 12 17 17" />
                </svg>
            </div>
        </div>

        <!-- ヘッダー部分 -->
        <header class="w-full h-10 px-6 fixed flex justify-between items-center border-b border-gray-300 bg-paper z-20">
            <!-- ハンバーガーアイコン -->
            <div id="hamburger">
                <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="4" y1="6" x2="20" y2="6" />
                    <line x1="4" y1="12" x2="20" y2="12" />
                    <line x1="4" y1="18" x2="20" y2="18" />
                </svg>
            </div>
            <!-- 画面左上に表示される場所 -->
            <div>{{ $iconArea }}</div>
        </header>

        {{-- wrapper --}}
        <div class="p-6 text-divenavy">

            {{ $slot }}

        </div>
        {{-- wrapperここまで --}}
    </div>
    {{-- 全体ここまで --}}

    <!-- jquery,main.js 読み込み -->
    <x-readjs />

</body>

</html>
