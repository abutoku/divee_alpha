<div>
    
    <!-- 地図 -->
    <section class="flex justify-center">
        <div id="target" class="w-[400px] h-[300px] sm:w-[900px] sm:h-[600px]"></div>
    </section>

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
        console.log(site.id) ;
        });

        });

        }

    </script>

</div>
