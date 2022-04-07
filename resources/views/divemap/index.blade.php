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

    {{-- 保存完了の表示 --}}
    @if(session('status'))
    <div id="flash_message" class="text-green-700 p-3 bg-green-300 rounded mt-16 mb-3 flex justify-center">
        {{ session('status') }}
    </div>
    @endif


</x-app-layout>

