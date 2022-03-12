<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

<div>
    {{-- 入力フォーム --}}
    <form action="{{ route('picture.update',$post->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        {{-- ファイル選択欄 --}}
        <input type="file" name="picture" id="post_picture" class="mb-12">
        {{-- プレビュー表示場所 --}}
        <img src="{{ Storage::url('uploads/no_image.png') }}" id="demo_picture" class="mb-4 h-48 object-cover">
        {{-- 登録ボタン --}}
        <x-button class="mb-12">登録</x-button>
    </form>
    <a href="{{ route('post.index') }}"><x-button>登録終了</x-button></a>
    {{-- 入力フォームここまで --}}
</div>

    {{-- ---------写真表示部分---------------- --}}

    @foreach ($post->pictures as $picture)
        <img src="{{ Storage::url($picture->picture) }}" class="h-48 object-cover">
    @endforeach

    {{-- ---------写真表示部分ここまで---------------- --}}


{{-- プロフィール写真が選択されたらプレビューを表示ここまで --}}
</x-app-layout>
