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
    {{-- -----マイプロフィール画面----- --}}

    <!-- wrapper -->
    <div class="flex justify-center">

        <div class="mt-16 w-[400px] sm:w-[600px]">
            {{-- プロフィール表示部分 --}}
            <section class="pt-10">
                <div  class="flex justify-center items-end w-full">
                    {{-- プロフィール画像 --}}
                    <div class="mr-10 flex justify-center items-center flex-col w-full ">

                    <img src="{{ Storage::url($profile->profile_image) }}" class="h-48 w-48 mb-2 rounded-full object-cover bg-white">

                    {{-- profile.edit プロフィール写真変更ページへのリンク --}}
                    @if ($profile->user_id === Auth::user()->id)
                    <a href="{{ route('profile.edit',$profile->id)  }}" class="text-xs">
                        プロフィール画像変更</a>
                    @endif

                    </div>

                    {{-- カードランク表示 Proの場合は表示なし --}}
                    @if($profile->card_rank !== 'Pro')
                    <div class="flex items-end self-end">
                        <b class="text-7xl">{{ $profile->dive_count }}</b>
                        <p>DIVE</p>
                    </div>
                    @endif

                </div>

                    {{-- ユーザー名 --}}
                    <div class="flex justify-between items-end">
                        <h1 class="text-4xl mt-10 mr-8"><b>{{ $profile->user->name }}</h1>
                    </div>

                    {{-- カードランク --}}
                    <div class="mt-6">
                        <div class="flex items-end w-300 h-300" >
                            <p class="mr-2 text-base">CARD RANK:</p>
                            <b class="text-3xl">{{ $profile->card_rank }}</b>
                        </div>
                    </div>

            </section>
            {{-- マイプロフィール表示部分ここまで --}}

            {{-- 選択ボタン --}}
            <section class="flex justify-center mt-8 ">
                <a href={{ route('profile.show',$profile->id ) }} class="rounded-2xl py-1 w-[120px] sm:w-[200px] mr-4 border-2
                    border-divenavy text-divenavy flex justify-around">
                    ステータス</a>
                <div
                    class="rounded-2xl py-1 w-[120px] sm:w-[200px] border-2 border-divenavy  bg-divenavy text-white flex justify-around">
                    BUDDY LIST</div>
            </section>
            {{-- バディリスト --}}
            <section class="mt-10">
                @forelse ( $buddies as $buddy )
                <a href="{{ route('profile.show',$buddy->user->id ) }}">
                    <div class="flex justify-start items-center bg-white drop-shadow-md rounded-lg mt-2 h-16">
                        <img src="{{ Storage::url($buddy->user->profile->profile_image) }}"
                            class="h-8 w-8 ml-4 rounded-full object-cover bg-white my-6">
                        <p class="ml-4">{{ $buddy->user->name }}</p>
                    </div>
                </a>
                @empty
                <p>情報はありません</p>
                @endforelse
            </section>

        </div>
    </div>
    <!-- wrapperここまで -->
</x-app-layout>
