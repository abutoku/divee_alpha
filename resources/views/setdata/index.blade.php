<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        {{-- ロゴなし --}}
    </x-slot>

    <section class="mt-12">
        @forelse ($setdatas as $setdata)
            <a href="{{ route('setdata.edit',$setdata->id) }}">
            <p>{{ $setdata->site_name }}</p>
            </a>
        @empty
            <p>登録がありません</p>
        @endforelse
    </section>


</x-app-layout>
