<x-title-page>

    {{-- 全体の背景 --}}
    <div class="bg-diveblue h-[1200px]">
        {{-- wrapper --}}
        <div class="w-11/12 pt-24 mr-auto ml-auto">

            {{-- ロゴマークの読み込み --}}
            <div class="flex justify-center">
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
                    <div class="flex justify-center">
                        <a href="{{ route('register') }}" class="ml-20 text-sm text-white dark:text-gray-500 underline">
                        新規登録はこちら</a>
                    </div>
                @endauth
        </div>
        {{-- wrapperここまで --}}
    </div>
    {{-- 全体ここまで --}}
</x-title-page>
