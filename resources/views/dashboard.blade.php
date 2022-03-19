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

    <!-- infomaiton -->
    <section class="flex justify-around">
        <p class="mb-6 bg-white rounded-lg h-16 drop-shadow-md flex justify-center items-center w-11/12">infomation</p>
    </section>

    <!-- 各種ボタン -->
    <section>

        <div class="flex justify-around">

            <a href="{{ route('profile.show', Auth::user()->id ) }}" class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">マイページ
            </a>

            <a href="{{ route('log.index') }}" class="bg-white rounded-lg drop-shadow-md h-24  w-5/12 mb-6 flex justify-center items-center">
                生物ログ</a>

        </div>

        <div class="flex justify-around">
            <div class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">Map</div>
            <div class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">海情報</div>
        </div>

        <div class="flex justify-around">
            <a href="{{ route('book.index') }}" class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">図鑑</a>
            <div class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">QRコード</div>
        </div>

        <div class="flex justify-around">
            <a  href="{{ route('post.create') }}" class="bg-white rounded-lg drop-shadow-md h-24 mb-6 flex justify-center items-center w-11/12">記事作成</a>
        </div>

    </section>
</x-app-layout>
