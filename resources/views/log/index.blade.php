<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    <!--wrapper-->
    <div class="pt-16">
        <a href="{{ route('log.create') }}"><x-button><svg class="h-5 w-5 text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
            <line x1="16" y1="5" x2="19" y2="8" />
        </svg>ログ作成</x-button></a>

        <section>
            <div class="flex flex-col items-center">
            @foreach ($logs as $log)
            {{-- 画像がある場合 --}}
                @if($log->image)
                    <div class="flex justify-between bg-white drop-shadow-md rounded-lg w-[400px] sm:w-[650px] h-60 my-5">
                        <div class="p-4 w-full">
                            <div class="flex justify-between">
                                {{-- テキスト部分 --}}
                                <div>
                                    <div class="mt-4">{{  $log->date }}</div>
                                    <div class="font-bold text-lg">{{  $log->book->fish_name }}</div>
                                    <div>{{  $log->site->site_name }}</div>
                                    <div>水深 : {{  $log->depth }}M</div>
                                    <div>水温 : {{  $log->temp }}℃</div>
                                </div>
                                {{-- 縦三点リーダー --}}
                                <div >
                                    <button >
                                        <svg class="h-5 w-5 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="1" />
                                            <circle cx="12" cy="19" r="1" />
                                            <circle cx="12" cy="5" r="1" />
                                        </svg>
                                    </button>
                                    {{-- 削除ボタン --}}
                                    <form action="{{ route('log.destroy',$log->id )}}" method="post" class="flex justify-end ">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="mt-6">
                                            <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        {{-- 生物画像 --}}
                        <div>
                            <img src="{{ Storage::url($log->image) }}" alt="picture" class="h-60 w-36 sm:w-[400px] object-cover rounded-r-lg">
                        </div>
                    </div>
            {{-- サムネイル画像が無い場合 --}}
                @else
                    <div class="flex flex-col bg-white drop-shadow-md rounded-lg w-[400px] sm:w-[650px] h-60 my-5 p-4">
                        <div class="flex justify-between">
                            {{-- テキスト部分 --}}
                            <div>
                                <div class="mt-4">{{  $log->date }}</div>
                                <div class="font-bold text-lg">{{  $log->book->fish_name }}</div>
                                <div>{{  $log->site->site_name }}</div>
                                <div>水深 : {{  $log->depth }}M</div>
                                <div>水温 : {{  $log->temp }}℃</div>
                            </div>
                            {{-- 縦三点リーダー --}}
                            <div>
                                <button>
                                    <svg class="h-5 w-5 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="1" />
                                        <circle cx="12" cy="19" r="1" />
                                        <circle cx="12" cy="5" r="1" />
                                    </svg>
                                </button>
                                {{-- 削除ボタン --}}
                                <form action="{{ route('log.destroy',$log->id )}}" method="post" class="flex justify-end ">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="mt-6">
                                        <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            
            </div>
        </section>

    </div>
    <!--wrapperここまで-->
</x-app-layout>
