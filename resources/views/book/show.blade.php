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

{{-- -----生物詳細画面----- --}}
    <section class="mt-16">
        <div class="flex justify-around">
            {{-- 画像の登録があるか？ --}}
            @if($book->picture)
            <img src="{{ Storage::url($book->picture) }}" alt="生物の写真"
            class="w-1/2 sm:w-1/3 object-cover">
            @else
            <img src="{{ Storage::url('uploads/no_image.png') }}" alt="画像無し"
            class="w-1/2 sm:w-1/3 object-cover">
            @endif

            <div class="w-1/2 sm:w-1/3 flex flex-col items-center">
                {{-- 生物名 --}}
                <h1 class="mt-8  md:text-3xl font-bold">{{ $book->fish_name }}</h1>
                {{-- 説明文 --}}
                @if($book->info)
                <div class="mt-4 ml-2 rounded-lg w-11/12 h-56 border bg-slate-50">{{ $book->info }}</div>
                @else
                <div class="mt-4 ml-2 rounded-lg w-11/12 h-56 sm:h-72 border bg-slate-50 flex"><svg class="h-5 w-5 text-gray-500" <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                </svg>Memo</div>
                @endif
            </div>
        </div>
    </section>

    {{-- 検索欄 --}}
    <section class="mt-12 flex flex-col w-[200px]">
        <input type="text" class="rounded-lg border-2 border-divenavy my-2" placeholder="場所検索">
        <input type="text" class="rounded-lg border-2 border-divenavy" placeholder="日時検索">
    </section>

    {{-- -----ログ表示部分----- --}}
    <div class="md:flex md:justify-center ">

        <section class="mt-12 flex justify-center md:w-1/2 ">
            <div>
                @foreach ($logs as $log)
                <div class="bg-white rounded-lg drop-shadow-md w-[480px] md:w-[600px] mb-4 p-4">
                    <div class="flex">
                        <p>{{ $log->date }}</p>
                        <p>{{ $log->site->site_name }}</p>
                    </div>
                    <div >
                        <p>水温: {{ $log->temp }}</p>
                        <p>水深: {{ $log->depth }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <section class="hidden lg:block w-1/2">
            <div class="flex flex-wrap justify-around">
                @foreach ($logs as $log)
                    @if($log->image)
                    <img src="{{ Storage::url($log->image) }}" class="w-1/4 h-48 rounded-lg object-cover">
                    @endif
                @endforeach
            </div>
        </section>

    </div>




</x-app-layout>
