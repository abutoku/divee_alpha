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
        <a href="{{ route('buddy.index') }}" class="rounded-2xl py-1 w-[200px] border-2 border-divenavy flex justify-around">
            BUDDY LOG</a>
    </section>

    <div class="lg:flex">
        <!-- profile -->
        <section class="flex justify-around lg:w-1/2">
                <!-- ユーザー名表示 -->
                <a href="{{ route('profile.show', Auth::user()->id ) }}"
                    class="flex flex-col justify-end mb-10 p-6 bg-slate-50 rounded-lg drop-shadow-md w-11/12 h-64 lg:h-96 bg-cover"
                    style="background-image: url('storage/uploads/cover.jpg');">
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
                    <a href="{{ route('log.index') }}" class=" rounded-lg drop-shadow-md w-5/12  h-32 lg:h-40  mb-6 flex justify-center items-center bg-cover" style="background-image: url('storage/uploads/log.jpg');">
                        <span class="text-white text-xl font-bold bg-black bg-opacity-50 px-2">生物ログ</span>
                    </a>

                    <a href="{{ route('book.index') }}"
                        class="rounded-lg drop-shadow-md w-5/12 2 h-32 lg:h-40 mb-6 flex justify-center items-center bg-cover" style="background-image: url('storage/uploads/picture.jpg');">
                        <span class="text-white text-xl font-bold bg-black bg-opacity-50 px-2">図鑑</span>
                    </a>
                </div>

                <div class="flex justify-around ">

                    <a href="{{ route('map.site') }}" class="rounded-lg drop-shadow-md w-5/12  h-32  lg:h-40 mb-6 flex justify-center items-center bg-cover" style="background-image: url('storage/uploads/map.jpg');">
                        <span class="text-white text-xl font-bold bg-black bg-opacity-50 px-2">Map</span>
                    </a>

                    <a href="{{ route('tide.info') }}" class="rounded-lg drop-shadow-md w-5/12  h-32 lg:h-40 mb-6 flex justify-center items-center bg-cover" style="background-image: url('storage/uploads/sea.jpg');">
                        <span class="text-white text-xl font-bold bg-black bg-opacity-50 px-2">潮</span>
                    </a>

                </div>
        </section>

    </div>
</x-app-layout>
