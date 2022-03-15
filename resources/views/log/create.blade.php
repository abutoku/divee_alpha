<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    <!--wrapper-->
    <div class="flex justify-center mt-6">

        <div class="px-2 pb-8 flex justify-center w-[400px] sm:w-[600px]">
            <form action="{{ route('log.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- 日付 --}}
                <div class="mt-8">
                    <div>
                        <div class="pr-8">日付</div>
                        <input type="date" name="date" class="w-[250px] sm:w-[300px] rounded-lg border-2 border-divenavy">
                    </div>
                {{-- 生物名 --}}
                    <div>
                        <div class="pr-8 mt-6">名前</div>
                        <input type="text" name="name" class="rounded-lg border-2 border-divenavy  w-[250px] sm:w-[300px]">
                    </div>
                {{-- 潜水地 --}}
                    <div>
                        <div class="pr-8 mt-6">ポイント</div>
                        <select type="text" name="divesite" class="rounded-lg border-2 border-divenavy  w-[250px] sm:w-[300px]">
                            <option>
                                <option disabled selected value>ポイントを選択</option>
                                <option value="志賀島 白瀬">志賀島 白瀬</option>
                                <option value="志賀島 黒瀬">志賀島 黒瀬</option>
                                <option value="長崎 辰ノ口">長崎 辰ノ口</option>
                                <option value="唐津 KMSC前">唐津 KMSC前</option>
                                <option value="呼子 家康">呼子 家康</option>
                            </option>
                        </select>
                    </div>
                {{-- 水深 --}}
                    <div>
                        <div class="pr-8 mt-6">水深</div>
                        <input type="number" value="50" min="0" name="depth" class="rounded-lg border-2 border-divenavy  w-[250px] sm:w-[300px]">
                    </div>
                {{-- 水温 --}}
                    <div>
                        <div class="pr-8 mt-6">水温</div>
                        <input  type="number" value="20"  min="0" name="temp" class="rounded-lg border-2 border-divenavy  w-[250px] sm:w-[300px] mb-10">
                    </div>

                    {{-- 画像を登録するボタン --}}
                    <div id="add_img" class="inline-flex items-center px-4 py-2 bg-divenavy border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">写真を登録</div><br>

                    <div id="img_input" class="w-[250px] sm:w-[300px]">
                        {{-- ファイル選択欄 --}}
                        <input type="file" name="image_data" id="log_image" class="my-6">
                        <div class="flex justify-center">
                            {{-- プレビュー表示場所 --}}
                            <img src="{{ Storage::url('uploads/no_image.png') }}" id="demo_pic" class="mb-4 h-48 object-cover" >
                        </div>
                    </div>

                    {{-- 登録ボタン --}}
                    <x-button class="my-8">登録終了</x-button><br>
                    <a href="{{ route('log.index') }}" >back</a>
                </div>
            </form>
        </div>
        {{-- ログ一覧に戻るボタン --}}

    </div>
    <!--wrapperここまで-->

</x-app-layout>
