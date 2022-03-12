<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>
    {{-- ------新規ログの入力画面------- --}}

    {{-- ------入力フォーム-------------- --}}
    <div class="flex justify-center">
    <div class="px-2 mx-2 my-4 rounded-lg shadow-lg bg-white max-w-sm w-full">
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <table class="mt-2">
            <tr>
                {{-- 日付 --}}
                <th>date</th>
                <td><input type="date" name="date"></td>
            </tr>
            {{-- コメント --}}
            <tr>
                <th>comment</th>
                <td>
                    <textarea name="message"></textarea>
                </td>
            </tr>
        </table>
        <x-button class="my-3">登録</x-button>
    </form>


    </div>
    {{-- ログ一覧に戻るボタン --}}
</div>
<a href="{{ route('post.index') }}">back</a>

    {{-- ------入力フォームここまで-------------- --}}
</x-app-layout>
