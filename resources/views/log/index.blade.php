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

        <section>
            <div class="flex flex-col items-center">
            @foreach ($logs as $log)
            {{-- 画像がある場合 --}}
                @if($log->image)
                    <div class="flex justify-between bg-white drop-shadow-md rounded-lg w-[350px] sm:w-[600px] h-60 my-5">
                        <div class="p-4">
                            <div class="font-bold text-lg">{{  $log->name }}</div>
                            <div class="mt-4">{{  $log->divesite }}</div>
                            <div>水深 : {{  $log->depth }}M</div>
                            <div>水温 : {{  $log->temp }}℃</div>
                        </div>
                        <div>
                            <img src="{{ Storage::url($log->image) }}" alt="picture" class="h-60 w-42 object-cover rounded-r-lg">
                        </div>
                    </div>
            {{-- サムネイル画像が無い場合 --}}
                @else
                    <div class="flex flex-col bg-white drop-shadow-md rounded-lg w-[350px] sm:w-[600px] h-60 my-5 p-4">
                        <div class="font-bold text-lg">{{  $log->name }}</div>
                        <div class="mt-4">{{  $log->divesite }}</div>
                        <div>水深 : {{  $log->depth }}M</div>
                        <div>水温 : {{  $log->temp }}℃</div>
                    </div>
                @endif
            @endforeach
            </div>
        </section>

    </div>
    <!--wrapperここまで-->
</x-app-layout>
