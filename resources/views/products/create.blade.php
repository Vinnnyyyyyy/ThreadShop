@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">
    <h2 class="brand-font text-4xl text-[#ffaa00] tracking-widest mb-6">ADD NEW PRODUCT</h2>

    <div class="bg-[#1a1a1a] border border-zinc-800 rounded-xl p-6">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('products._form')
            <div class="flex gap-3">
                <button type="submit"
                        class="bg-[#ffaa00] text-black font-black px-8 py-2 rounded-lg hover:bg-yellow-300 transition">
                    Save Product
                </button>
                <a href="{{ route('home') }}"
                   class="border border-zinc-600 text-zinc-300 font-bold px-6 py-2 rounded-lg hover:border-white hover:text-white transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection