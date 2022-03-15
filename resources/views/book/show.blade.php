<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

{{-- -----生物詳細画面----- --}}
    <section class="pt-12">
        <div class="flex justify-around">
            <div>
                {{-- 生物名 --}}
                <h1 class="text-6xl font-bold">{{ $book->fish_name }}</h1>
                {{-- 説明文 --}}
                <p>{{ $book->info }}</p>
            </div>
            {{-- 画像の登録があるか？ --}}
            @if($book->picture)
                <img src="{{ Storage::url($book->picture) }}" alt="生物の写真"
                class="w-1/2 object-cover">
            @else
                <img src="{{ Storage::url('uploads/no_image.png') }}" alt="画像無し"
                class="w-1/2 object-cover">
            @endif

        </div>
    </section>



</x-app-layout>
