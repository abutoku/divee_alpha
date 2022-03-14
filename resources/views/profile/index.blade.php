<x-app-layout>
    {{-- ヘッダーロゴ部分 --}}
    <x-slot name="iconArea">
        <a href={{ route('dashboard') }}>
            <x-text-logo/>
        </a>
    </x-slot>


{{-- メンバーのカードランクとダイブ本数の一覧 --}}
<section class="bg-paper text-divenavy mt-6">

    <div class="flex flex-col justify-center h-full ">
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 p-6">
            <header class="mt-2 mx-2 px-5 py-4 border-b border-t border-gray-100 bg-gradient-to-r from-blue-700 via-purple-500 to-blue-900 text-white font-bold rounded-xl drop-shadow-md">
                <h2>Pro</h2>
            </header>
    @forelse ($pro as $x)
        <a href="{{ route('profile.show',$x->id) }}" method="get">
            <div class="flex items-center px-5 py-4">
                <img src="{{ Storage::url($x->profile_image) }}" class="rounded-lg h-12 w-12">
                <div class="mx-4">{{ $x->user->name }}</div>
            </div>
        </a>
        <hr class="mx-8">

    @empty
        <p>メンバーがいません</p>
    @endforelse

<header class="mt-2 mx-2 px-5 py-4 border-b border-t border-gray-100 bg-gradient-to-r from-blue-700 via-purple-500 to-pink-700 text-white font-bold rounded-xl drop-shadow-md">
<h2>DM</h2>
</header>
    @forelse ($dm as $x)
        <a href="{{ route('profile.show',$x->id) }}" method="get">
            <div class="flex items-center px-5 py-4">
                <img src="{{ Storage::url($x->profile_image) }}" class="rounded-lg h-12 w-12">
                <div class="mx-4">{{ $x->user->name }}</div>
                <div class="ml-auto font-bold">{{ $x->dive_count }}</div>
            </div>
        </a>
        <hr class="mx-8">
    @empty
        <p>メンバーがいません</p>
    @endforelse

<header class="mt-2 mx-2 px-5 py-4 border-b border-t border-gray-100 bg-gradient-to-r from-blue-700 via-purple-500 to-yellow-600 text-white font-bold rounded-xl drop-shadow-md">
<h2>MSD</h2>
</header>
    @forelse ($msd as $x)
    <a href="{{ route('profile.show',$x->id) }}" method="get">
        <div class="flex items-center px-5 py-4">
            <img src="{{ Storage::url($x->profile_image) }}" class="rounded-lg h-12 w-12">
            <div class="mx-4">{{ $x->user->name }}</div>
            <div class="ml-auto font-bold">{{ $x->dive_count }}</div>
        </div>
    </a>
    <hr class="mx-8">
    @empty
        <p>メンバーがいません</p>
    @endforelse
<header class="mt-2 mx-2 px-5 py-4 border-b border-t border-gray-100 bg-gradient-to-r from-blue-700  to-green-500 text-white font-bold rounded-xl drop-shadow-md">
<h2>AOW</h2>
</header>
    @forelse ($aow as $x)
    <a href="{{ route('profile.show',$x->id) }}" method="get">
        <div class="flex items-center px-5 py-4">
            <img src="{{ Storage::url($x->profile_image) }}" class="rounded-lg h-12 w-12">
            <div class="mx-4">{{ $x->user->name }}</div>
            <div class="ml-auto font-bold">{{ $x->dive_count }}</div>
        </div>
    </a>
    <hr class="mx-8">
    @empty
        <p>メンバーがいません</p>
    @endforelse
<header class="mt-2 mx-2 px-5 py-4 border-b border-t border-gray-100 bg-gradient-to-r from-blue-700 to-blue-300 text-white font-bold rounded-xl drop-shadow-md">
<h2>OW</h2>
</header>
    @forelse($ow as $x)
    <a href="{{ route('profile.show',$x->id) }}" method="get">
        <div class="flex items-center px-5 py-4">
            <img src="{{ Storage::url($x->profile_image) }}" class="rounded-lg h-12 w-12 ">
            <div class="mx-4">{{ $x->user->name }}</div>
            <div class="ml-auto font-bold">{{ $x->dive_count }}</div>
        </div>
    </a>
    <hr class="mx-8">
    @empty
        <p>メンバーがいません</p>
    @endforelse

{{-- メンバーのカードランクとダイブ本数の一覧ここまで --}}
        </div>
    </div>
</section>

</x-app-layout>
