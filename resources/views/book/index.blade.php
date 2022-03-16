<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    <div class="flex flex-col items-center mt-12">
    @forelse ($books as $book)
        {{-- 画像がある場合 --}}
        @if($book->picture)
            <a href="{{ route('book.show',$book->id) }}" class="bg-white  drop-shadow-md rounded-lg w-[350px] sm:w-[600px] h-40 my-5 overflow-hidden">
                <div class="flex justify-between items-center">
                    <div class="p-4">
                        <p class="font-bold text-xl">{{$book->fish_name}}</p>
                    </div>
                    <img class="h-40 w-36 object-cover rounded-r-lg" src="{{ Storage::url($book->picture) }}">
                </div>
            </a>
        {{-- 画像が無い場合 --}}
        @else
            <a href="{{ route('book.show',$book->id) }}" class="bg-white drop-shadow-md rounded-lg w-[350px] sm:w-[600px] h-36 my-5 p-4 overflow-hidden flex items-center">
                <p class="font-bold text-xl">{{$book->fish_name}}</p>
                <p>{!! nl2br(e($book->info)) !!}</p>
            </a>
        @endif
    @empty
            <p>まだ投稿がありません</p>
    @endforelse

    </div>
</x-app-layout>
