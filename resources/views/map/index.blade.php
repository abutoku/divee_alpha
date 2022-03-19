<x-app-layouts>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

</x-app-layouts>

<script async defer src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config('app.google_api') }}&callback=initMap"></script>
