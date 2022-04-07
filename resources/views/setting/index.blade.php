<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconLeft">
        <x-hamburger />
    </x-slot>

    <x-slot name="iconRight">
        <a href={{ route('dashboard') }}>
            <x-text-logo />
        </a>
    </x-slot>

    {{-- 各種設定一覧 --}}
    <section class="mt-16">

        <ul>

            <a href="{{ route('site.create') }}">
                <li class="mb-6">ダイブサイト登録</li>
            </a>

            <a href="{{ route('divemap.index') }}">
                <li>水中地図設定</li>
            </a>

            

        </ul>

    </section>


</x-app-layout>
