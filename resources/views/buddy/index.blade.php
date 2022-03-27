<x-app-layout>

    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo />
        </a>
    </x-slot>

        <video id="preview"></video>

        <script type="text/javascript">
            const Instascan = require （'instascan' ）;

            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                scanner.addListener('scan', function (content) {
                console.log(content);
                });
                Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
                }).catch(function (e) {
                console.error(e);
                });
                
        </script>

</x-app-layout>
