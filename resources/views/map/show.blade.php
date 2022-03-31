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
        <section class="flex mt-16 mb-8 justify-center sm:justify-start">
            <a href="{{ route('map.site') }}"
            class="rounded-2xl py-1 w-[200px] border-2 border-divenavy flex justify-around">
            MAPに戻る</a>
        </section>

        <div>
            @forelse ($logs as $log)
            <p>{{ $log->date }}</p>
            <p>{{ $log->book->fish_name }}</p>
            <p>{{ $log->user->name }}</p>
            @empty
            情報はありません
            @endforelse
        </div>

    </div>
</x-app-layout>
