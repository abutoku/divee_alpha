<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    <!-- 選択ボタン -->
    <section class="flex mt-8 mb-8 justify-center sm:justify-start">
        <a href="{{ route('map.site') }}" class="rounded-2xl py-1 w-[200px] mr-4 border-2 border-divenavy  text-divenavy flex justify-around">
            場所</a>
        <div class="rounded-2xl py-1 w-[200px] border-2 border-divenavy bg-divenavy text-white flex justify-around">
            投稿記事</div>
    </section>

    <!-- 地図 -->
    <section class="flex justify-center">
        <div id="target" class="w-[400px] h-[300px] sm:w-[900px] sm:h-[600px]"></div>
    </section>

</x-app-layout>

{{-- google map --}}
<script async defer src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config('app.google_api') }}&callback=initMap"></script>

<script>
    //受け取ったデータをjson化
    const posts = @json($posts);

    //投稿記事の地図設定
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

        //ダイブサイトにピンを表示
        posts.forEach(function(post){

        if(post.latitude !== null && post.longitude !== null){
            const pin = {lat:post.latitude, lng:post.longitude};

            marker = new google.maps.Marker({
            position:pin,
            map:map,
            title:'hello!',
            animation: google.maps.Animation.BOUNCE,
            });

        }

        // //マーカーをクリックすると発動
        // marker.addListener("click",function() {
        // //site_idを取得
        // document.getElementById("site_id").value = site.id;
        // //ポイント名を取得してHTML変更
        // const name = `<p>${site.site_name}</p>`;
        // $('#site_name').html(name);
        // });

        });

    }

</script>
