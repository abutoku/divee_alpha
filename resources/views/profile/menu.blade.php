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

    {{-- プロフィール編集 --}}
    <section class="mt-16">

            <div class="bg-white w-80 rounded-lg">

                <div class="flex justify-start items-center h-12 border-b ml-2 cursor-pointer">
                    <a href="{{ route('profile.edit',Auth::user()->profile->id) }}">プロフィール画像変更</a>
                </div>

                <div class="flex justify-start items-center h-12 border-b ml-2 cursor-pointer">
                    <a href="{{ route('profile.cover',Auth::user()->profile->id) }}">プロフィールカバー画像変更定</a>
                </div>

            </div>
    </section>


</x-app-layout>
