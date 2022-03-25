<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    <!-- 選択ボタン -->
    <section class="flex mt-8 mb-8 justify-center sm:justify-start">
        <div class="rounded-2xl py-1 w-[200px] mr-4 border-2 border-divenavy bg-divenavy text-white flex justify-around">
            生物</div>
        <a href="{{ route('map.post') }}" class="rounded-2xl py-1 w-[200px] border-2 border-divenavy flex justify-around">
            投稿記事</a>
    </section>

    <livewire:sitemap />


</x-app-layout>
