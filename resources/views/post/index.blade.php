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

    <!-- 選択ボタン -->
    <section class="flex mt-8 mb-8 justify-center sm:justify-start">
        <a href="{{ route('dashboard') }}" class="rounded-2xl py-1 w-[200px] mr-4 border-2 border-divenavy text-divenavy flex justify-around">
            HOME</a>
        <div class="rounded-2xl py-1 w-[200px] border-2 border-divenavy  bg-divenavy text-white flex justify-around">
            BUDDY LOG</div>
    </section>


    {{-- -----一覧表示部分--------- --}}
    <section>

    </section>
    {{-- -----一覧表示部分--------- --}}

</x-app-layout>
