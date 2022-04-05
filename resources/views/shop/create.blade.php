<x-guest-layout>
    {{-- 新規登録→プロフィール登録画面 --}}
    <x-auth-card>

        {{-- ロゴ表示部分 --}}
        <x-slot name="logo">
            <a href="/">
                <x-application-logo />
            </a>
        </x-slot>

        {{-- プロフィール入力フォーム --}}
        <form action="{{ route('shop.store') }}" method="post">
            @csrf
            <div class="ml-14">
                <p>ショップを選択</p>
                @foreach ($shops as $shop)
                <x-button class="mt-4 ml-64">
                    <div>
                        <img src="{{ Storage::url($shop->logo ) }}" class="rounded-full h-8 w-8 object-cover mr-2">
                        <p>{{ $shop->name }}</p>

                    </div>
                </x-button>
                @endforeach
            </div>
        </form>

        <a href="{{ route('dashboard') }}">
            <x-button>登録しない</x-button>
        </a>

    </x-auth-card>
</x-guest-layout>
