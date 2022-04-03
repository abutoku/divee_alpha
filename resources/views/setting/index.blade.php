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

    <section class="mt-16">

        <ul>

            <a href="{{ route('profile.edit',Auth::user()->profile->id) }}">
            <li>プロフィール画像変更</li>
            </a>

            <a href="{{ route('profile.cover',Auth::user()->profile->id) }}">
            <li>プロフィールカバー画像変更</li>
            </a>

        </ul>

    </section>


</x-app-layout>
