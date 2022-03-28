<x-app-layout>

    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        {{-- ロゴなし --}}
    </x-slot>

    {{-- ----dashboardメイン部分---- --}}

    <!-- 選択ボタン -->
    <section class="flex mt-8 mb-8 justify-center sm:justify-start">
        <div class="rounded-2xl py-1 w-[200px] mr-4 border-2 border-divenavy bg-divenavy text-white flex justify-around">
            HOME</div>
        <a href="{{ route('post.index') }}" class="rounded-2xl py-1 w-[200px] border-2 border-divenavy flex justify-around">
            タイムライン</a>
    </section>

    <!-- profile -->
    <section class="flex justify-around">
            <!-- ユーザー名表示 -->
            <a href="{{ route('profile.show', Auth::user()->id ) }}" class="flex justify-center items-center sm:justify-start my-10 py-10 bg-white rounded-lg drop-shadow-md w-11/12">
                <img src="{{ Storage::url(Auth::user()->profile->profile_image) }}"
                    class="h-24 w-24 rounded-full object-cover bg-white mr-4">
                <div class="text-2xl font-bold">{{ Auth::user()->name }}</div>
            </a>
    </section>

    <!-- 各種ボタン -->
    <section>

        <div class="flex justify-around">
            <a href="{{ route('log.index') }}" class="bg-white rounded-lg drop-shadow-md h-24  w-5/12 mb-6 flex justify-center items-center">
                生物ログ</a>
            <a href="{{ route('book.index') }}"
                class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">図鑑</a>
        </div>

        <div class="flex justify-around">
            <a href="{{ route('map.site') }}" class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">Map</a>
            <div class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">海情報</div>
        </div>

    </section>
</x-app-layout>
