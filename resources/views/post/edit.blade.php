<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconLeft">
        <x-hamburger />
    </x-slot>

    <x-slot name="iconRight">
        <a href={{ route('dashboard') }}>
            <x-text-logo />
        </a>
    </x-slot>

    {{-- ------ログの更新（編集）画面------- --}}

    {{-- ------入力フォーム-------------- --}}
    <div class="flex justify-center mt-10">
        <form action="{{ route('post.update',$post->id) }}" method="POST" class="mt-10">
            @method('put')
            @csrf
            <div>
                <div>date</div>
                <div><input type="date" name="date" value="{{ $post->date}}" class="rounded-lg border-2 border-divenavy w-[250px] sm:w-[300px] mb-6"></div>
            </div>

            <div>
                <div>コメント</div>
                <div><textarea name="message" class="rounded-lg border-2 border-divenavy h-36 w-[250px] sm:w-[300px]">{{ $post->message}}</textarea></div>
            </div>

            <x-button class="mt-6 mb-12">更新</x-button>
        </form>
    </div>
    {{-- ------入力フォームここまで-------------- --}}

<hr>
<div class="flex justify-center items-center mt-10">

    <x-button id="select_picture" class="mr-6">サムネイル変更</x-button>
    <x-button id="delete_picture">写真を削除</x-button>

    <div id="thumbnail_view">
        <p>一覧画面に表示する画像を選択してください</p>
        @foreach ($post->pictures as $picture)
        <form action="{{ route('picture.change',$picture->id)}}" method="post">
            @csrf
            <button>
                <img src="{{ Storage::url($picture->picture) }}" class="h-48 object-cover">
            </button>
        </form>
        @endforeach
    </div>


    <div id="delete_view">
        <p>削除する画像を選んでください</p>

        @foreach ($post->pictures as $picture)
        <form action="{{ route('picture.destroy',$picture->id ) }}" method="post">
            @method('DELETE')
            @csrf
            <button>
                <img src="{{ Storage::url($picture->picture) }}" class="h-48 object-cover">
            </button>
        </form>
        @endforeach

    </div>
</div>

<div class="flex justify-center mt-10">
    {{-- 戻るボタン --}}
    <a href="{{ route('post.index') }}"><x-button>back</x-button></a>
</div>

</x-app-layout>
