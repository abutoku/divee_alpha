<x-app-layout>

    <x-slot name="iconArea">

    </x-slot>

    <section class="flex mt-8 mb-8">
        <div>HOME</div>
        <div>タイムライン</div>
    </section>

    <section class="mb-6">
        <h1>infomation</h1>
    </section>

    <section>

        <div class="flex">
            <a href="{{ route('profile.show', Auth::user()->id ) }}">
                <div>マイページ</div>
            </a>

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

</x-app-layout>
