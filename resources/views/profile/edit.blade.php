<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

{{-- -----プロフィールの写真登録----- --}}

        <div>
            {{-- 入力フォーム --}}
            <form action="{{ route('profile.update',$profile->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                {{-- プレビュー表示場所 --}}
                <img src="{{ Storage::url($profile->profile_image) }}" id="demo_img" class="rounded-full h-48 w-48 object-cover mb-12" >
                {{-- ファイル選択欄 --}}
                <input type="file" name="profile_image" id="profile_image">
                {{-- 変更ボタン --}}
                <x-button>変更</x-button>
            </form>
            {{-- 入力フォームここまで --}}
        </div>

<!-- jquery読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

{{-- プロフィール写真が選択されたらプレビューを表示 --}}
<script>
    $('#profile_image').on('change', function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $("#demo_img").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    });
</script>
{{-- プロフィール写真が選択されたらプレビューを表示ここまで --}}

{{-- -----プロフィール写真登録ここまで----- --}}


{{-- ヘッダー要素・コンポーネント 閉じタグ⏬⏬--}}
</x-app-layout>
{{-- ヘッダー要素・コンポーネント 閉じタグ⏫⏫--}}
