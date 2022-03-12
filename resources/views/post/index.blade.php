<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
    </x-slot>

    <!-- 選択ボタン -->
    <section class="flex mt-8 mb-8 justify-center sm:justify-start">
        <a href="{{ route('dashboard') }}" class="rounded-2xl py-1 w-[200px] mr-4 border-2 border-divenavy text-divenavy flex justify-around">
            HOME</a>
        <div class="rounded-2xl py-1 w-[200px] border-2 border-divenavy  bg-divenavy text-white flex justify-around">
            タイムライン</div>
    </section>

    {{-- -----一覧表示部分--------- --}}

    @foreach ($posts as $post)
    <div class="w-full flex flex-col items-center">
        <a href="{{ route('post.show',$post->id) }}">
        <div class="h-40 w-[350px] flex rounded-lg overflow-hidden border sm:w-[600px] sm:h-40 bg-white mx-3 md:mx-0 lg:mx-0 my-5">
            <div class="w-full flex flex-col justify-between p-4">
                <div class="flex mt-2">
                    <div class="rounded-full h-8 w-8 flex items-center justify-center overflow-hidden">
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

            <!-- サムネイル表示部分 -->
            @if($post->thumbnail)
            <div class="h-40 w-36 flex-none mb-10 relative">
                <img class="z-10 w-full h-full object-cover rounded-r-lg" src="{{ Storage::url($post->thumbnail) }}">
            </div>
            <!-- サムネイル画像がない場合 -->
            @else
            <div class="h-40 w-36 flex-none mb-10 relative ">
                <img class="z-10 w-full h-full object-cover rounded-r-lg" src="{{ Storage::url('uploads/no_image.png') }}">
            </div>
            @endif
            <!-- サムネイル表示部分ここまで -->

        </div>
        </a>
    @endforeach

</div>
{{-- -----一覧表示部分--------- --}}

</x-app-layout>
