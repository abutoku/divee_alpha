<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo />
        </a>
    </x-slot>

    <!-- 選択ボタン -->
    <section class="flex mt-8 mb-8 justify-center sm:justify-start">
        <a href="{{ route('dashboard') }}"
            class="rounded-2xl py-1 w-[200px] mr-4 border-2 border-divenavy text-divenavy flex justify-around">
            HOME</a>
        <div class="rounded-2xl py-1 w-[200px] border-2 border-divenavy  bg-divenavy text-white flex justify-around">
            BUDDY LOG</div>
    </section>

    <a href="{{ route('buddy.create') }}" ><x-button>ログ投稿</x-button></a>

    <section>
        @forelse ($buddies as $buddy)
            <div class="bg-slate-100 rounded-lg drop-shadow-md p-4 mt-4">
                <p class="mb-2 text-xs">{{ $buddy->user->created_at->format('Y/m/d') }}</p>
                <div class="flex justify-start items-center mb-4">
                    <img src="{{  Storage::url($buddy->user->profile->profile_image)  }}" class="w-10 h-10">
                    <p>{{ $buddy->user->name }}</p>
                </div>
                <p class="mt-8">{!! nl2br(e($buddy->message)) !!}</p>
            </div>
        @empty
            <p>ログはありません</p>
        @endforelse
    </section>

</x-app-layout>
