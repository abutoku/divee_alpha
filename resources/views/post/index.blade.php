<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    {{-- -----ログの一覧画面----- --}}

    {{-- ログ追加ボタン
    <x-button class="ml-5 mt-">
        <a href="{{ route('post.create') }}">create</a>
    </x-button> --}}

    {{-- -----一覧表示部分--------- --}}

    @foreach ($posts as $post)
<div class="w-full flex flex-col items-center">
    <a href="{{ route('post.show',$post->id) }}">
    <div class="h-40 w-80 flex rounded-lg overflow-hidden border  lg:w-80 md:w-80 bg-white mx-3 md:mx-0 lg:mx-0 my-5">
        <div class="w-full flex flex-col justify-between p-4">
            <div class="flex">
                <div class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
                    <img src="{{ Storage::url($post->user->profile->profile_image) }}" alt="profilepic">
                </div>
                <span class="pt-1 ml-2 font-bold text-sm">{{$post->user->name}}</span>
            </div>
            <span class="px-2 hover:bg-gray-300 cursor-pointer rounded"><i class="fas fa-ellipsis-h pt-2 text-lg"></i></span>
            <div class="px-3 pb-2">
                <div class="pt-1">
                    <div class="mb-2 text-sm">
                            <p>{{$post->date}}</p>
                        <p>{!! nl2br(e($post->message)) !!}</p>
                    </div>
                    <!-- <p class="mt-2">more＞</p> -->
                </div>
            </div>
        </div>

        @if($post->thumbnail)
        <div class="h-40 w-36 flex-none mb-10 relative">
            <img class="z-10 w-full h-full object-cover rounded-r-lg" src="{{ Storage::url($post->thumbnail) }}">
        </div>
        @else
        <div class="h-40 w-36 flex-none mb-10 relative ">
            <img class="z-10 w-full h-full object-cover rounded-r-lg" src="{{ Storage::url('uploads/no_image.png') }}">
        </div>
        @endif

    </div>
    </a>
    @endforeach

</div>
{{-- -----一覧表示部分--------- --}}

</x-app-layout>
