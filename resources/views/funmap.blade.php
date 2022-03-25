<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Divee - Map</title>

    <!-- tailwind_css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
        background-color: #015DC6;
        }
        .main {
        height: 1200px;
        }

    </style>
</head>
<body>
    <main>
        <section class="flex justify-center pt-36">
            <div id="target" class="w-[500px] h-[300px] sm:w-[1000px] sm:h-[600px]"></div>
        </section>

    </main>

    {{-- google map --}}
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config('app.google_api') }}&callback=initMap">
    </script>

    <script>
        //地図設定
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

        }
    </script>
</body>
</html>
