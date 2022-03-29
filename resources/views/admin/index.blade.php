<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        {{-- ロゴなし --}}
    </x-slot>

    <section class="mt-12">

        <ul>
            <li>
                <a href="{{ route('setdata.index') }}">データ一覧</a>
            </li>
            <li>
                <a href="{{ route('setdata.create') }}">データ入力</a>
            </li>
        </ul>

    </section>


</x-app-layout>
