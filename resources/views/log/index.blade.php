<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconLeft">
            <x-hamburger/>
    </x-slot>

    <x-slot name="iconRight">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    <!--wrapper-->
    {{-- 作成ボタン --}}
    <div class="pt-16">
        <a href="{{ route('log.create') }}"><x-button>
            <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
            <line x1="16" y1="5" x2="19" y2="8" />
            </svg>ログ作成</x-button>
        </a>

    {{-- 検索欄 --}}
        <section class="flex flex-col w-[200px]">
            <input type="text" class="rounded-lg border-2 border-divenavy my-2" placeholder="場所検索">
            <input type="text" class="rounded-lg border-2 border-divenavy" placeholder="日時検索">
        </section>

    {{-- 表示部分 --}}
        <section class="mt-8">
            <div class="flex flex-col items-center">
            @foreach ($logs as $log)
            {{-- 画像がある場合 --}}
                @if($log->image)
                    <div class="flex justify-between bg-white drop-shadow-md rounded-lg w-[400px] sm:w-[650px] h-40 sm:h-60 my-5">
                        <div class="p-2 sm:p-4 w-full">
                            <div class="flex justify-between">
                                {{-- テキスト部分 --}}
                                <div>
                                    <div class="mt-4 text-xs sm:text-base">{{  $log->date }}</div>
                                    <div class="font-bold text-lg">{{  $log->book->fish_name }}</div>
                                    <div class="text-sm sm:text-base">{{  $log->site->site_name }}</div>
                                    <div class="text-sm sm:text-base">水深 : {{  $log->depth }}M</div>
                                    <div class="text-sm sm:text-base">水温 : {{  $log->temp }}℃</div>
                                </div>
                                {{-- 縦三点リーダー --}}
                                <div x-data="{ open:false }" @click.away="open = false" @close.stop="open = false" class="flex flex-col items-end">
                                    <button @click="open = !open">
                                        <svg class="h-5 w-5 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="1" />
                                            <circle cx="12" cy="19" r="1" />
                                            <circle cx="12" cy="5" r="1" />
                                        </svg>
                                    </button>
                                    {{-- 削除ボタン --}}
                                    <form x-show="open" x-transition action="{{ route('log.destroy',$log->id )}}" method="post" x-cloak>
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="mt-6 py-2 px-4 border rounded-lg">削除</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        {{-- 生物画像 --}}
                        <div>
                            <img src="{{ Storage::url($log->image) }}" alt="picture" class="h-40 sm:h-60 w-56 sm:w-[400px] object-cover rounded-r-lg">
                        </div>
                    </div>
            {{-- サムネイル画像が無い場合 --}}
                @else
                    <div class="flex flex-col bg-white drop-shadow-md rounded-lg w-[400px] sm:w-[650px] h-40 sm:h-60 my-5 p-2 sm:p-4">
                        <div class="flex justify-between">
                            {{-- テキスト部分 --}}
                            <div>
                                <div class="mt-4 text-xs sm:text-base">{{  $log->date }}</div>
                                <div class="font-bold text-lg">{{  $log->book->fish_name }}</div>
                                <div class="text-sm sm:text-base">{{  $log->site->site_name }}</div>
                                <div class="text-sm sm:text-base">水深 : {{  $log->depth }}M</div>
                                <div class="text-sm sm:text-base">水温 : {{  $log->temp }}℃</div>
                            </div>
                            {{-- 縦三点リーダー --}}
                            <div x-data="{ open:false }" @click.away="open = false" @close.stop="open = false" class="flex flex-col items-end">
                                <button @click="open = !open">
                                    <svg class="h-5 w-5 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="1" />
                                        <circle cx="12" cy="19" r="1" />
                                        <circle cx="12" cy="5" r="1" />
                                    </svg>
                                </button>
                                {{-- 削除ボタン --}}
                                <form x-show="open" x-cloak x-transition action="{{ route('log.destroy',$log->id )}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="mt-6 py-2 px-4 border rounded-lg">削除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            </div>
        </section>
    {{-- 表示部分ここまで --}}
    </div>
    <!--wrapperここまで-->
</x-app-layout>
