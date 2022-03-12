<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>

    {{-- ------ログの更新（編集）画面------- --}}

    {{-- ------入力フォーム-------------- --}}
    <form action="{{ route('post.update',$post->id) }}" method="POST">
        @method('put')
        @csrf
        <table>
            <tr>
                {{-- 日付 --}}
                <th>date</th>
                <td><input type="date" name="date" value="{{ $post->date}}"></td>
            </tr>
            <tr>
                {{-- コメント --}}
                <th>comment</th>
                <td>
                    <textarea name="message">{{ $post->message}}</textarea>
                </td>
            </tr>
        </table>

        <x-button class="mb-12">更新</x-button>
    </form>
    {{-- ------入力フォームここまで-------------- --}}

    <x-button id="select_picture">サムネイル変更</x-button>

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

    <x-button id="delete_picture">写真を削除</x-button>

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


    {{-- 戻るボタン --}}
    <a href="{{ route('post.index') }}"><x-button>back</x-button></a>

    <script>

        //一覧画面は消しておく
        $('#thumbnail_view').hide();
        $('#delete_view').hide();

        //サムネイル変更をクリックすると登録写真一覧を表示
        $('#select_picture').on('click',function(){
            $('#thumbnail_view').show();
        })

        //写真を削除をクリックすると登録写真一覧を表示
        $('#delete_picture').on('click',function(){
            $('#delete_view').show();
        })

    </script>



</x-app-layout>
