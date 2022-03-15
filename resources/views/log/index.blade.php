<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    <!--wrapper-->
    <div class="pt-24">
        <h1>ログ一覧画面</h1>

        <a href="{{ route('log.create') }}"><x-button>ログ作成</x-button></a>

        <section>
            @foreach ($logs as $log)
            <div>{{  $log->name }}</div>
            <div>{{  $log->depth }}</div>
            <div>{{  $log->temp }}</div>

            @endforeach
        </section>

    </div>
    <!--ここまでr-->


</x-app-layout>
