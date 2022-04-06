<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconLeft">
        <x-hamburger />
    </x-slot>

    <x-slot name="iconRight">
        {{-- ロゴなし --}}
    </x-slot>

    {{-- ----dashboardメイン部分---- --}}

    <!-- 選択ボタン -->
    <section class="flex mt-14 mb-8 justify-center sm:justify-start">
        <div class="rounded-2xl py-1 w-[200px] mr-4 border-2 border-divenavy bg-divenavy text-white flex justify-around">
            HOME</div>
        <a href="{{ route('buddy.index') }}" class="rounded-2xl py-1 w-[200px] border-2 border-divenavy flex justify-around mr-2 relative">
            BUDDY LOG
            @if($notice >= 1)
            <span class="absolute top-0 right-0 flex h-5 w-5 ">
                <span class="animate-ping absolute inline-flex h-5 w-5 rounded-full bg-pink-400 opacity-75"></span>
                <span class="relative  rounded-full h-5 w-5 bg-pink-500 flex justify-center items-center">
                    <p class="text-white text-xs">{{ $notice }}</p>
                </span>
            </span>
            @endif
        </a>
    </section>

    <div class="lg:flex">
        <!-- profile -->
        <section class="flex justify-around lg:w-1/2">
                <!-- ユーザー名表示 -->
                <a href="{{ route('profile.show', Auth::user()->id ) }}"
                    class="flex flex-col justify-end mb-10 p-6 bg-slate-50 rounded-lg drop-shadow-md w-11/12 h-64 lg:h-96 bg-cover bg-center"
                    style="background-image: url({{ Storage::url(Auth::user()->profile->cover_image) }});">
                    <img src="{{ Storage::url(Auth::user()->profile->profile_image) }}"
                        class="h-24 w-24 rounded-full object-cover bg-white mr-4 mb-2">
                    <div class="text-2xl font-bold text-white bg-black bg-opacity-50">{{ Auth::user()->name }}</div>
                    <div class="text-lg text-white bg-black bg-opacity-50">{{ Auth::user()->profile->dive_count }}DIVE</div>
                    <div class="text-lg text-white bg-black bg-opacity-50">card rank : {{ Auth::user()->profile->card_rank }}</div>
                </a>
        </section>

        <!-- 各種ボタン -->

        <section class="lg:w-1/2">

            <div class="flex justify-around">
                <!-- 生物ログ-->
                <a href="{{ route('log.index') }}" class=" rounded-lg drop-shadow-md w-5/12  h-32 lg:h-40  mb-6 flex justify-center items-center bg-cover bg-center" style="background-image: url('storage/uploads/log.jpg');">
                    <span class="text-white text-xl font-bold bg-black bg-opacity-50 px-2">生物ログ</span>
                </a>

                <!-- 潮 -->
                <a href="{{ route('tide.info') }}"
                class="rounded-lg drop-shadow-md w-5/12  h-32 lg:h-40 mb-6 flex justify-center items-center bg-cover bg-center"
                style="background-image: url('storage/uploads/tide.jpg');">
                <span class="text-white text-xl font-bold bg-black bg-opacity-50 px-2">潮</span>
                </a>
            </div>

            <div class="flex justify-around ">
                <!-- 図鑑 -->
                <a href="{{ route('book.index') }}"
                class="rounded-lg drop-shadow-md w-5/12 2 h-32 lg:h-40 mb-6 flex justify-center items-center bg-cover bg-center"
                style="background-image: url('storage/uploads/picture.jpg');">
                <span class="text-white text-xl font-bold bg-black bg-opacity-50 px-2">図鑑</span>
                </a>

                <!-- Map -->
                <a href="{{ route('map.site') }}" class="rounded-lg drop-shadow-md w-5/12  h-32  lg:h-40 mb-6 flex justify-center items-center bg-cover bg-center" style="background-image: url('storage/uploads/map.jpg');">
                    <span class="text-white text-xl font-bold bg-black bg-opacity-50 px-2">Map</span>
                </a>
            </div>

            <div class="flex justify-around w-full">
                <!-- 陸の情報 -->
                <a href="{{ route('map.post') }}"
                    class="flex justify-center items-center mb-10 p-6  rounded-lg drop-shadow-md w-11/12 h-32 lg:h-40 bg-cover bg-center"
                    style="background-image: url('storage/uploads/aft.jpg');">
                    <span class="text-white text-xl font-bold bg-black bg-opacity-50 px-2">After Diving</span>
                </a>
            </div>
        </section>


        <!-- 各種ボタンここまで -->
    </div>
</x-app-layout>
