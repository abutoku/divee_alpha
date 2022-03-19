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
            生物</div>
        <a href="{{ route('map.post') }}" class="rounded-2xl py-1 w-[200px] border-2 border-divenavy flex justify-around">
            投稿記事</a>
    </section>

    <!-- 地図 -->
    <section class="flex justify-center">
        <div id="target" class="w-[400px] h-[300px] sm:w-[900px] sm:h-[600px]"></div>
    </section>

</x-app-layout>

{{-- google map --}}
<script async defer src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config('app.google_api') }}&callback=initMap"></script>

<script>

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
