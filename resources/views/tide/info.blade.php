<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo />
        </a>
    </x-slot>

    <section class="mt-24">
        <p>ポイントを選択</p>
        <form action="#">
            <select name="" id="">
                <option value="">hoge</option>
                <option value="">hoge</option>
                <option value="">hoge</option>
            </select>
            <x-button>表示切り替え</x-button>
        </form>
    </section>

    <section class="mt-24 flex justify-center">
        <div class="bg-slate-100 drop-shadow-md rounded-lg w-[350px] sm:w-[600px] h-48 my-5 p-4">

            {{-- @dd($tide); --}}
            <h1 class="font-bold text-2xl mb-4">志賀島 白瀬</h1>
            <div class="flex justify-between">
                <div>
                    <p>{{ $tide['moon']['title'] }}</p>
                    <p>現在の水温</p>
                    <p>14℃</p>
                </div>

                <div>
                    <p>干潮</p>
                    <p>{{ $tide['edd'][0]['time'] }}</p>
                    <p>{{ $tide['edd'][1]['time']}}</p>
                </div>

                <div>
                    <p>満潮</p>
                    <p>{{ $tide['flood'][0]['time'] }}</p>
                    <p>{{ $tide['flood'][1]['time']}}</p>
                </div>

            </div>
        </div>
    </section>

</x-app-layout>
