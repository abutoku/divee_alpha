<x-app-layout>

    <x-slot name="iconArea">

    </x-slot>

    <section class="flex mt-8 mb-8">
        <div class="rounded-2xl py-1 w-[200px] mr-4 border-2 border-divenavy bg-divenavy text-white flex justify-around">
            HOME</div>
        <div class="rounded-2xl py-1 w-[200px] border-2 border-divenavy flex justify-around">
            タイムライン</div>
    </section>

    <section class="mb-6 bg-white rounded-lg h-16 drop-shadow-md flex justify-center  flex justify-center items-center">
        <p>infomation</p>
    </section>

    <section>

        <div class="flex justify-around">

            <a href="{{ route('profile.show', Auth::user()->id ) }}" class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">マイページ
            </a>

            <div class="bg-white rounded-lg drop-shadow-md h-24  w-5/12 mb-6 flex justify-center items-center">
                生物ログ</div>

        </div>

        <div class="flex justify-around">
            <div class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">Map</div>
            <div class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">海情報</div>
        </div>

        <div class="flex justify-around">
            <div class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">図鑑</div>
            <div class="bg-white rounded-lg drop-shadow-md h-24 w-5/12 mb-6 flex justify-center items-center">QRコード</div>
        </div>

        <div>
            <div class="bg-white rounded-lg drop-shadow-md h-24 mb-6 flex justify-center items-center">記事作成</div>
        </div>

    </section>

</x-app-layout>
