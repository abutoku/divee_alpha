<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconLeft">
        <a href="{{ route('log.index') }}" class="flex">
            <svg class="h-6 w-6 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6" />
            </svg>
            <span class="ml-2 text-divenavy">back</span>
        </a>
    </x-slot>

    <x-slot name="iconRight">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    <!--wrapper-->
    <div class="flex justify-center mt-12">
        <div class="mt-6 px-2 pb-8 flex justify-center w-[400px] md:w-[900px]">
            <form action="{{ route('log.store') }}" method="POST" enctype="multipart/form-data" class="md:w-full">
                @csrf

                <div class="md:flex md:w-full">
                    {{-- 入力欄 --}}
                    <div class="mt-8 md:w-1/2">
                        {{-- 日付 --}}
                        <div>
                            <div class="pr-8">日付</div>
                            <input type="date" name="date" class="w-[250px] sm:w-[300px] rounded-lg border-2 border-divenavy">
                        </div>
                        {{-- 生物名 --}}
                        <div>
                            <div class="pr-8 mt-6">生物名</div>
                            <input type="text" name="name" class="rounded-lg border-2 border-divenavy  w-[250px] sm:w-[300px]">
                        </div>
                        {{-- 潜水地 --}}
                        <div>
                            <div class="pr-8 mt-6">ポイント</div>
                            <select type="text" name="site_id" class="rounded-lg border-2 border-divenavy  w-[250px] sm:w-[300px]">
                                <option>
                                    <option disabled selected value>ポイントを選択</option>
                                    @foreach ($sites as $site)
                                    <option value="{{ $site->id }}">{{ $site->site_name }}</option>
                                    @endforeach
                                </option>
                            </select>
                        </div>
                        {{-- 水深 --}}
                        <div>
                            <div class="pr-8 mt-6">水深</div>
                            <input type="number" value="10" min="0" name="depth" class="rounded-lg border-2 border-divenavy  w-[120px] ">  M
                        </div>
                        {{-- 水温 --}}
                        <div>
                            <div class="pr-8 mt-6">水温</div>
                            <input  type="number" value="20"  min="0" name="temp" class="rounded-lg border-2 border-divenavy  w-[120px]  mb-10">  ℃
                        </div>
                    </div>
                    {{-- 入力欄ここまで --}}


                    {{-- <a href="#" id="add_tag" class="inline-flex items-center px-4 py-2 bg-divenavy border border-transparent rounded-md font-semibold text-xs text-white  hover:bg-gray-700 disabled:opacity-25 transition ease-in-out duration-150">タグを追加</a> --}}

                    {{-- 画像登録エリア --}}
                    <div class="md:mt-8 md:w-1/2">
                        {{-- ボタン --}}
                        <div id="add_img" class="inline-flex items-center px-4 py-2 bg-divenavy border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">写真を登録</div>

                        {{-- ボタンがクリックされたら表示される部分 --}}
                        <div id="img_input" class="w-[250px] sm:w-[300px]">
                            {{-- ファイル選択欄 --}}
                            <input type="file" name="image_data" id="log_image" class="my-6">
                            <div class="flex justify-center">
                                {{-- プレビュー表示場所 --}}
                                <img src="{{ Storage::url('uploads/no_image.png') }}" id="demo_pic" class="mb-4 h-48 object-cover" >
                            </div>
                        </div>
                    </div>
                    {{-- 画像登録エリアここまで --}}
                </div>

                {{-- 登録ボタン --}}
                <x-button class="my-8">登録終了</x-button><br>
            </form>
        </div>
        {{-- ログ一覧に戻るボタン --}}

    </div>
    <!--wrapperここまで-->

</x-app-layout>
