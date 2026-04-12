@extends('layouts.app')

@section('content')

<a href="{{ route('home') }}"
   class="inline-block mb-6 text-zinc-400 hover:text-[#ffaa00] transition text-sm">
    ← Back to Shop
</a>

<div class="grid grid-cols-1 md:grid-cols-2 gap-10">

    {{-- Image --}}
    <div>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                 class="w-full h-96 object-cover rounded-xl border border-zinc-800" alt="{{ $product->name }}">
        @else
            <div class="w-full h-96 bg-zinc-800 rounded-xl flex items-center justify-center text-8xl border border-zinc-700">
                👕
            </div>
        @endif
    </div>

    {{-- Details --}}
    <div class="flex flex-col justify-center">
        <span class="bg-[#ffaa00] text-black text-xs font-bold px-3 py-1 rounded-full w-fit mb-3">
            {{ $product->category }}
        </span>

        <h1 class="brand-font text-5xl text-white tracking-wide mb-2">{{ $product->name }}</h1>
        <p class="text-zinc-400 mb-1">Size: <span class="text-white font-semibold">{{ $product->size }}</span></p>
        <p class="text-[#ffaa00] font-black text-4xl my-3">₱{{ number_format($product->price, 2) }}</p>
        <p class="text-zinc-300 mb-4">{{ $product->description }}</p>
        <p class="text-zinc-500 text-sm mb-6">Available Stock: {{ $product->stock }}</p>

        {{-- Add to Cart - for logged in users only --}}
        @auth
            @if($product->stock > 0)
                <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-4">
                    @csrf
                    <button class="w-full bg-[#ffaa00] text-black font-black text-lg py-3 rounded-xl hover:bg-yellow-300 transition">
                        🛒 Add to Cart
                    </button>
                </form>
            @else
                <button disabled class="w-full bg-zinc-700 text-zinc-400 font-black text-lg py-3 rounded-xl cursor-not-allowed">
                    Out of Stock
                </button>
            @endif
        @else
            {{-- Guest - show login prompt --}}
            <a href="{{ route('login') }}"
               class="w-full text-center bg-zinc-800 border border-[#ffaa00] text-[#ffaa00] font-black text-lg py-3 rounded-xl hover:bg-[#ffaa00] hover:text-black transition mb-4 block">
                Login to Add to Cart
            </a>
        @endauth

        {{-- Admin only - Edit and Delete --}}
        @auth
            @if(Auth::user()->role === 'admin')
                <div class="flex gap-3 mt-3">
                    <a href="{{ route('products.edit', $product) }}"
                       class="flex-1 text-center border border-zinc-600 text-zinc-300 font-bold py-2 rounded-lg hover:border-white hover:text-white transition">
                        Edit
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                          onsubmit="return confirm('Delete this product?')" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button class="w-full border border-red-700 text-red-500 font-bold py-2 rounded-lg hover:bg-red-700 hover:text-white transition">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        @endauth

    </div>

</div>

@endsection