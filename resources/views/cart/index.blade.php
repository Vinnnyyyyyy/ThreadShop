@extends('layouts.app')

@section('content')

<h2 class="brand-font text-4xl text-[#ffaa00] tracking-widest mb-6">YOUR CART</h2>

@if(empty($cart))
    <div class="text-center py-20">
        <p class="text-zinc-500 text-xl mb-4">Your cart is empty.</p>
        <a href="{{ route('home') }}"
           class="bg-[#ffaa00] text-black font-black px-8 py-3 rounded-lg hover:bg-yellow-300 transition">
            Continue Shopping
        </a>
    </div>
@else
    <div class="bg-[#1a1a1a] border border-zinc-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-black border-b border-zinc-800">
                <tr>
                    <th class="text-left text-zinc-400 font-semibold px-6 py-4">Product</th>
                    <th class="text-left text-zinc-400 font-semibold px-6 py-4">Price</th>
                    <th class="text-left text-zinc-400 font-semibold px-6 py-4">Qty</th>
                    <th class="text-left text-zinc-400 font-semibold px-6 py-4">Subtotal</th>
                    <th class="text-left text-zinc-400 font-semibold px-6 py-4">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-800">
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr class="hover:bg-zinc-800 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}"
                                         class="w-14 h-14 object-cover rounded-lg border border-zinc-700">
                                @else
                                    <div class="w-14 h-14 bg-zinc-800 rounded-lg flex items-center justify-center text-2xl">👕</div>
                                @endif
                                <span class="text-white font-semibold">{{ $item['name'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-zinc-300">₱{{ number_format($item['price'], 2) }}</td>
                        <td class="px-6 py-4 text-zinc-300">{{ $item['quantity'] }}</td>
                        <td class="px-6 py-4 text-[#ffaa00] font-bold">₱{{ number_format($subtotal, 2) }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="border border-red-700 text-red-500 text-xs font-bold px-3 py-1 rounded-lg hover:bg-red-700 hover:text-white transition">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-black border-t border-zinc-700">
                <tr>
                    <td colspan="3" class="px-6 py-4 text-right text-zinc-400 font-semibold">Total:</td>
                    <td colspan="2" class="px-6 py-4 text-[#ffaa00] font-black text-2xl">
                        ₱{{ number_format($total, 2) }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="flex gap-3 mt-6">
        <a href="{{ route('home') }}"
           class="border border-zinc-600 text-zinc-300 font-bold px-6 py-2 rounded-lg hover:border-white hover:text-white transition">
            ← Continue Shopping
        </a>
        <button class="bg-[#ffaa00] text-black font-black px-8 py-2 rounded-lg hover:bg-yellow-300 transition">
            Checkout (coming soon)
        </button>
    </div>
@endif

@endsection