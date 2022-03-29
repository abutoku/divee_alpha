<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo />
        </a>
    </x-slot>

    {{-- ポイント選択部分 --}}
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

    {{-- 情報表示部分 --}}
    <section class="mt-24 flex justify-center">
        <div class="bg-white drop-shadow-md rounded-lg w-[350px] sm:w-[600px] h-48 my-5 p-4">

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

    {{-- グラフ表示部分 --}}
    <section class="flex justify-center flex-col items-center">
        <p>水温</p>
        <div class="w-[600px] h-[350px] bg-slate-50">
            <canvas id="my_chart"></canvas>
        </div>
    </section>

    <!-- Chart.js読み込み -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <script>
        'use strict';

        //折れ線グラフ
        var type = 'line';

        var data = {
            labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets:[
                {
                    data:[13,12,10,14,18,20,23,25,27,24,18,16],
                    borderColor:'skyblue',
                    pointBackgroundColor:'skyblue',
                    borderWidth:4,
                }
            ]
        };

        var options = {
            layout: {
                padding: {
                    left: 50,
                    right: 50,
                    top: 50,
                    bottom: 0
                }
            },
            scales:{
                y: {
                // suggestedMin:0,
                beginAtZero: true,
                suggestedMax:30,
                },
            },
            plugins: {
                legend: {
                    display: false, //凡例の非表示
                },
            },
        };

        //canvasを描画するためのctxを取得
        var ctx = document.getElementById('my_chart').getContext('2d');

        //上記をmyChartに渡す
        var myChart = new Chart(ctx,{
        type: type,
        data: data,
        options: options,
        });

    </script>
</x-app-layout>
