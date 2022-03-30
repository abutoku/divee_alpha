<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo />
        </a>
    </x-slot>

    <section class="mt-24 flex justify-center">
        <form action="{{ route('buddy.store') }}" method="post" class="flex flex-col w-[300px]">
            @csrf
            <select name="dive_count" class="rounded-lg border-2 border-divenavy">
                <option disabled selected value>ダイブ本数</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="0">本数の登録無し</option>
            </select>

            <select name="buddy_id" class="mt-6 rounded-lg border-2 border-divenavy">
                <option disabled selected value>バディを選択</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <p class="mt-6">message</p>
            <textarea name="message" class="rounded-lg border-2 border-divenavy h-[200px]"></textarea>

            <x-button class="mt-6 flex justify-center">投稿</x-button>
        </form>
    </section>

</x-app-layout>
