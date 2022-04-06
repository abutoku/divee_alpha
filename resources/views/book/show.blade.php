<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconLeft">
        <a href="{{ route('book.index') }}" class="flex">
            <svg class="h-6 w-6 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6" />
            </svg>
            <span class="ml-2 text-divenavy">back</span>
        </a>
    </x-slot>

    <x-slot name="iconRight">
        <a href={{ route('dashboard') }}>
            <x-text-logo />
        </a>
    </x-slot>

{{-- -----生物詳細画面----- --}}
    <section class="mt-16">
        <div class="flex justify-around">
            <div class="flex flex-col w-1/2 sm:w-1/3">
            {{-- 画像の登録があるか？ --}}
            @if($book->picture)
                <img src="{{ Storage::url($book->picture) }}" alt="生物の写真"
                class="object-cover h-72 md:h-80 rounded-lg drop-shadow-2xl">
            @else
                <img src="{{ Storage::url('uploads/no_image.png') }}" alt="画像無し"
                class="object-cover h-72 md:h-80 rounded-lg drop-shadow-2xl">
            @endif
                <a href="{{ route('book.select',$book->id) }}" class="text-xs mt-2">写真変更</a>
                <a href="{{ route('book.memo',$book->id ) }}" class="text-xs mt-2">MEMO編集</a>
            </div>

            <div class="w-1/2 sm:w-1/3 flex flex-col items-center">
                {{-- 生物名 --}}
                <h1 class="mt-8  md:text-3xl font-bold">{{ $book->fish_name }}</h1>
                {{-- 説明文 --}}
                @if($book->info)
                <div class="mt-4 ml-2 p-4 rounded-lg w-11/12 h-56 border bg-slate-50">
                    {!! nl2br(e($book->info)) !!}
                </div>
                @else
                <div class="mt-4 ml-2 p-4 rounded-lg w-11/12 h-56 sm:h-72 border bg-slate-50 flex"><svg class="h-5 w-5 text-gray-500" <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
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
    <div class="md:flex md:justify-center">

        <section class="mt-12 lg:w-1/2">
            @foreach ($logs as $log)
            <div x-data="{ open: false }" @click.away="open = false" @close.stop="open = false" class="flex justify-center ">

                <div class="show-btn bg-white rounded-lg drop-shadow-md w-[400px] lg:w-11/12 mb-4 p-4  hover:bg-gray-100 cursor-pointer"  @click="open = ! open" id="{{ $log->id }}">
                    <div class="flex">
                        <p class="mr-4">{{ $log->date }}</p>
                        <p>{{ $log->site->site_name }}</p>
                    </div>
                </div>

                {{-- モーダル部分 --}}
                <div class="inset-0 w-full h-full fixed flex items-center justify-center z-20"
                style="background-color: rgba(0,0,0,.5);" x-show="open" x-cloak>

                    <div class="text-left bg-white h-[600px] p-6 overflow-y-auto" @click.away="open = false">
                        <h2 class="text-2xl font-bold mb-2">{{ $book->fish_name }}</h2>
                        <p class="text-xs">{{ $log->date }}</p>
                        <p>{{ $log->site->site_name }}</p>
                        <p>水温 : {{ $log->temp }} ℃</p>
                        <p class="mb-4">水深 : {{ $log->depth }} M</p>
                        @if($log->image)
                        <div class="flex justify-center">
                        <img src="{{ Storage::url($log->image) }}" class="w-[300px] h-[200px] rounded-lg object-cover">
                        </div>
                        @endif
                        <div id="canvas_contents" class="mt-8">
                            <!-- canvas入力画面 -->
                            <canvas id="canvas" width="360" height="240" style="border:1px solid #000;"></canvas>
                        </div><!-- canvas入力画面ここまで -->
                        <div class="flex justify-center mt-8">
                            <x-button class="bg-gray-700 text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none"
                            @click="open = false">Close</x-button>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach
        </section>

        {{-- 写真の表示部分 --}}
        <section class="hidden lg:block md:w-1/2">
            <div class="flex flex-wrap justify-around">
                @foreach ($logs as $log)
                    @if($log->image)
                    <img src="{{ Storage::url($log->image) }}" class="w-56 h-40 rounded-lg object-cover mb-2">
                    @endif
                @endforeach
            </div>
        </section>

    </div>
</x-app-layout>

<script>

    const logs = @json($logs);

    //canvasについての記述
    const can = $('#canvas')[0]; //キャンバスそのものを変数
    const ctx = can.getContext("2d"); //canに対してgetContext関数を実行し書き込み権限を与える

    //パスの開始
    ctx.beginPath();

    $('.show-btn').on('click',function(){

        const target = logs.find(x => x.id = this.id);

        pointX = target.point_x; //位置の横軸を変数に代入
        pointY = target.point_y; //位置の縦軸を変数に代入

        ctx.beginPath();//パスの開始
        ctx.fillStyle = "#ff0000";//色指定
        //Rect(座標、半径、円のスタート度、エンド度（描画）、回転)
        ctx.arc(pointX, pointY, 5, 0, Math.PI * 2, false);
        ctx.stroke();//実際に書く関数(枠線)
        ctx.fill(); //塗りつぶし

    });

</script>
