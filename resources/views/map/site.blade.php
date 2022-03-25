<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    <!-- 選択ボタン -->
    <section class="flex mt-8 mb-8 justify-center sm:justify-start">
        <div class="rounded-2xl py-1 w-[200px] mr-4 border-2 border-divenavy bg-divenavy text-white flex justify-around">
            場所</div>
        <a href="{{ route('map.post') }}" class="rounded-2xl py-1 w-[200px] border-2 border-divenavy flex justify-around">
            投稿記事</a>
    </section>

    <a id="name_search">生物名</a>
    <form action="{{ route('map.search') }}" method="POST">
        @csrf
        <input type="text" name="search_name">
        <x-button>検索</x-button>
    </form>

    <!-- 地図 -->
    <div class="flex flex-col items-center">

        <div class="text-4xl font-bold my-8 mr-2">
            <p id="site_name">ポイントを選択</p>
            <section class="flex justify-center">
                <form action="{{ route('map.getSiteLog') }}" method="POST">
                    @csrf
                    <input type="hidden" name="siteid" id="site_id">
                    <x-button>検索</x-button>
                </form>
            </section>
        </div>

        <section class="flex justify-center">
            <div id="target" class="w-[500px] h-[300px] sm:w-[1000px] sm:h-[600px]"></div>
        </section>

    </div>

</x-app-layout>

    {{-- google map --}}
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config('app.google_api') }}&callback=initMap">
    </script>

    <script>
        //受け取ったデータをjson化
            const sites = @json($sites);

            //生物の地図設定
            function initMap() {
                'use strict'

                var target = document.getElementById('target');
                var map;
                //latitude（緯度）,longitude（経度）
                var fukuoka = {lat:33.5867214193664, lng:130.3946010116519};
                var marker;

                //33.5867214193664, 130.3946010116519
                map = new google.maps.Map(target,{
                    center:fukuoka,
                    zoom:8,
                    disableDefaultUI:true,
                });

            //ダイブサイトにピンを表示
            sites.forEach(function(site){

            const pin = {lat:site.latitude, lng:site.longitude};

            marker = new google.maps.Marker({
                position:pin,
                map:map,
                title:site.site_name,
                animation: google.maps.Animation.DROP,
            });

            //マーカーをクリックすると発動
            marker.addListener("click",function() {
            //site_idを取得
            document.getElementById("site_id").value = site.id;
            //ポイント名を取得してHTML変更
            const name = `<p>${site.site_name}</p>`;
            $('#site_name').html(name);
            });
        });
    }

    </script>
