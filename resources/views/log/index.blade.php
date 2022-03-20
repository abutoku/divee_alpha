<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    <!--wrapper-->
    <div class="pt-16">
        <a href="{{ route('log.create') }}"><x-button>ログ作成</x-button></a>
        <input type="text" placeholder="検索">
        <input type="text" placeholder="選択">

        <section>
            <div class="flex flex-col items-center">
            @foreach ($logs as $log)
            {{-- 画像がある場合 --}}
                @if($log->image)
                    <div class="flex justify-between bg-white drop-shadow-md rounded-lg w-[350px] sm:w-[600px] h-60 my-5">
                        <div class="p-4">
                            <div class="font-bold text-lg">{{  $log->book->fish_name }}</div>
                            <div class="mt-4">{{  $log->date }}</div>
                            <div>{{  $log->site->site_name }}</div>
                            <div>水深 : {{  $log->depth }}M</div>
                            <div>水温 : {{  $log->temp }}℃</div>
                            {{-- 削除ボタン --}}
                            <form action="{{ route('log.destroy',$log->id )}}" method="post">
                                @method('delete')
                                @csrf
                                {{-- 削除ボタン --}}
                                <button type="submit" class="mt-6">
                                    <svg class="h-6 w-6 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div>
                            <img src="{{ Storage::url($log->image) }}" alt="picture" class="h-60 w-36 sm:w-48 object-cover rounded-r-lg">
                        </div>
                    </div>
            {{-- サムネイル画像が無い場合 --}}
                @else
                    <div class="flex flex-col bg-white drop-shadow-md rounded-lg w-[350px] sm:w-[600px] h-60 my-5 p-4">
                        <div class="font-bold text-lg">{{  $log->book->fish_name }}</div>
                        <div class="mt-4">{{  $log->date }}</div>
                        <div>{{  $log->divesite }}</div>
                        <div>水深 : {{  $log->depth }}M</div>
                        <div>水温 : {{  $log->temp }}℃</div>
                        {{-- 削除ボタン --}}
                            <form action="{{ route('log.destroy',$log->id )}}" method="post">
                                @method('delete')
                                @csrf
                                {{-- 削除ボタン --}}
                                <button type="submit" class="mt-6">
                                    <svg class="h-6 w-6 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                    </div>
                @endif
            @endforeach
            </div>
        </section>

    </div>
    <!--wrapperここまで-->
</x-app-layout>
