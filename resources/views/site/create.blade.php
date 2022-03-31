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

    <section class="mt-8 flex justify-center items-center flex-col">
        <h1 class="text-xl font-bold mb-4">ダイブサイト登録</h1>
        <div class="py-10 rounded-lg shadow-lg bg-white flex justify-center w-[400px] sm:w-[600px]">
            <form action="{{ route('site.store') }}" method="POST">
                @csrf
                    <p>サイト名</p>
                    <input type="text" name="site_name" class="w-[250px] sm:w-[300px] rounded-lg border-2 border-divenavy mb-8">
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">

                    <div id="target" class="h-[300px] w-[300px] sm:h-[500px] sm:w-[500px] "></div>

                    {{-- 登録ボタン --}}
                <x-button class="my-12">登録</x-button><br>
                {{-- ログ一覧に戻るボタン --}}
                <a href="{{ route('dashboard') }}" >back</a>


            </form>
        </div>
    </section>

</x-app-layout>

<script async defer src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config('app.google_api') }}&callback=initMap"></script>
{{-- <script src="{{ mix('js/map.js') }}"></script> --}}

<script>

    //投稿記事の地図の設定
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
            zoom:14,
            disableDefaultUI:true,
        });

        map.addListener('click',function(e){
            if(marker){
                marker.setMap(null);
            }
            console.log(e.latLng.lat());
            console.log(e.latLng.lng());
            console.log(e.latLng.toString());
            document.getElementById( "latitude" ).value = e.latLng.lat() ;
            document.getElementById( "longitude" ).value = e.latLng.lng();

            marker = new google.maps.Marker({
            position:e.latLng,
            map:map,
            title:e.latLng.toString(),
            animation: google.maps.Animation.DROP,
        });

        //クリックした場所を中心にする
        this.panTo(e.latLng);

        });
    }

</script>
