<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        {{-- ロゴなし --}}
    </x-slot>

    <section class="mt-12">
        @forelse ($setdatas as $setdata)
            <p>{{ $setdata->site_name }}</p>
        @empty
            <p>登録がありません</p>
        @endforelse
    </section>


</x-app-layout>
