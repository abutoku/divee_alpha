<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>
    {{-- ------新規ログの入力画面------- --}}

    {{-- ------入力フォーム-------------- --}}
    <div class="flex justify-center mt-10">
        
        <div class="px-2 pb-8 rounded-lg shadow-lg bg-white flex justify-center w-[400px] sm:w-[600px]">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                {{-- 日付 --}}
                <div class="mt-8">
                    <div>
                        <div class="pr-8">date</div>
                        <input type="date" name="date" class="w-[250px] sm:w-[300px] rounded-lg border-2 border-divenavy">
                    </div>
                {{-- コメント --}}
                    <div>
                        <div class="pr-8 mt-6">コメント</div>
                        <textarea name="message" class="rounded-lg border-2 border-divenavy  h-36 w-[250px] sm:w-[300px]"></textarea>
                    </div>
                </div>
                {{-- 登録ボタン --}}
                <x-button class="my-8">登録</x-button><br>
                <a href="{{ route('post.index') }}" >back</a>
            </form>
        </div>
        {{-- ログ一覧に戻るボタン --}}
    </div>

    {{-- ------入力フォームここまで-------------- --}}
</x-app-layout>