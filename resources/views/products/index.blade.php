@extends('layouts.app')

@section('content')

<h2 class="brand-font text-4xl text-[#ffaa00] tracking-widest mb-6">ALL CLOTHING</h2>

{{-- Search & Filter --}}
<form method="GET" action="{{ route('home') }}" class="flex flex-wrap gap-3 mb-8">
    <input type="text" name="search"
           class="flex-1 min-w-[200px] bg-[#1a1a1a] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00]"
           placeholder="Search by name..." value="{{ request('search') }}">

    <select name="category"
            class="bg-[#1a1a1a] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00]">
        <option value="">All Categories</option>
        <option value="Men"    {{ request('category') == 'Men'    ? 'selected' : '' }}>Men</option>
        <option value="Women"  {{ request('category') == 'Women'  ? 'selected' : '' }}>Women</option>
        <option value="Kids"   {{ request('category') == 'Kids'   ? 'selected' : '' }}>Kids</option>
        <option value="Unisex" {{ request('category') == 'Unisex' ? 'selected' : '' }}>Unisex</option>
    </select>

    <button type="submit"
            class="bg-[#ffaa00] text-black font-bold px-6 py-2 rounded-lg hover:bg-yellow-300 transition">
        Filter
    </button>
</form>

{{-- Product Grid --}}
@if($products->isEmpty())
    <div class="text-center py-20">
        <p class="text-zinc-500 text-xl">No products found.</p>
        <a href="{{ route('products.create') }}" class="mt-4 inline-block bg-[#ffaa00] text-black font-bold px-6 py-2 rounded-lg hover:bg-yellow-300 transition">
            + Add First Product
        </a>
    </div>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="bg-[#1a1a1a] border border-zinc-800 rounded-xl overflow-hidden card-hover">

            {{-- Image --}}
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="w-full h-56 object-cover" alt="{{ $product->name }}">
            @else
                <div class="w-full h-56 bg-zinc-800 flex items-center justify-center text-6xl">
                    👕
                </div>
            @endif

            {{-- Body --}}
            <div class="p-4">
                <span class="bg-[#ffaa00] text-black text-xs font-bold px-2 py-1 rounded-full">
                    {{ $product->category }}
                </span>
                <h3 class="text-white font-bold text-lg mt-2">{{ $product->name }}</h3>
                <p class="text-zinc-400 text-sm">Size: {{ $product->size }}</p>
                <p class="text-[#ffaa00] font-bold text-xl mt-1">₱{{ number_format($product->price, 2) }}</p>
                <p class="text-zinc-500 text-sm">Stock: {{ $product->stock }}</p>
            </div>

            {{-- Footer --}}
            <div class="px-4 pb-4 flex gap-2">
                <a href="{{ route('products.show', $product) }}"
                   class="flex-1 text-center border border-[#ffaa00] text-[#ffaa00] text-sm font-bold py-2 rounded-lg hover:bg-[#ffaa00] hover:text-black transition">
                    View
                </a>
                <a href="{{ route('products.edit', $product) }}"
                   class="flex-1 text-center border border-zinc-600 text-zinc-300 text-sm font-bold py-2 rounded-lg hover:border-white hover:text-white transition">
                    Edit
                </a>
                <form action="{{ route('products.destroy', $product) }}" method="POST"
                      onsubmit="return confirm('Delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button class="border border-red-700 text-red-500 text-sm font-bold px-3 py-2 rounded-lg hover:bg-red-700 hover:text-white transition">
                        Del
                    </button>
                </form>
            </div>

        </div>
        @endforeach
    </div>

    <div class="mt-8">{{ $products->links() }}</div>
@endif

@endsection