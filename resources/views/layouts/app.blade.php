<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThreadShop – Clothing Marketplace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Barlow', sans-serif; }
        .brand-font { font-family: 'Bebas Neue', sans-serif; }
        .card-hover { transition: transform 0.2s ease, border-color 0.2s ease; }
        .card-hover:hover { transform: translateY(-5px); border-color: #ffaa00 !important; }
    </style>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
</head>
<body class="bg-[#111111] text-white min-h-screen">

<!-- Navbar -->
<nav class="bg-black border-b-2 border-[#ffaa00] sticky top-0 z-50 shadow-xl">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 hover:opacity-80 transition">
                <img src="{{ asset('images/logo.png') }}" alt="ThreadShop Logo" class="h-12 w-12 rounded-full">
                <span class="brand-font text-[#ffaa00] text-4xl tracking-widest">THREADSHOP</span>
            </a>

        {{-- Nav Links --}}
        <div class="flex items-center gap-3">

            @auth
                {{-- Admin only: Add Product button --}}
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('products.create') }}"
                       class="bg-[#ffaa00] text-black font-bold text-sm px-5 py-2 rounded-lg hover:bg-yellow-300 transition">
                        + Add Product
                    </a>
                @endif

                {{-- Cart - for all logged in users --}}
                <a href="{{ route('cart.index') }}"
                   class="border-2 border-[#ffaa00] text-[#ffaa00] font-bold text-sm px-5 py-2 rounded-lg hover:bg-[#ffaa00] hover:text-black transition">
                    🛒 Cart ({{ count(session()->get('cart', [])) }})
                </a>

                {{-- User Dropdown --}}
                <div class="relative group">
                    <button class="flex items-center gap-2 bg-zinc-800 border border-zinc-700 text-white text-sm font-bold px-4 py-2 rounded-lg hover:border-[#ffaa00] transition">
                        👤 {{ Auth::user()->name }}
                        @if(Auth::user()->role === 'admin')
                            <span class="bg-[#ffaa00] text-black text-xs font-black px-2 py-0.5 rounded-full">ADMIN</span>
                        @endif
                        <span class="text-zinc-400 text-xs">▼</span>
                    </button>
                    {{-- Invisible bridge to prevent gap --}}
                    <div class="absolute right-0 w-44 pt-2 hidden group-hover:block z-50">
                        <div class="bg-[#1a1a1a] border border-zinc-700 rounded-xl shadow-xl">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-3 text-red-400 hover:bg-zinc-800 hover:text-red-300 transition rounded-xl text-sm font-semibold">
                                    🚪 Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            @else
                {{-- Not logged in --}}
                <a href="{{ route('login') }}"
                   class="border border-zinc-600 text-zinc-300 font-bold text-sm px-5 py-2 rounded-lg hover:border-[#ffaa00] hover:text-[#ffaa00] transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="bg-[#ffaa00] text-black font-bold text-sm px-5 py-2 rounded-lg hover:bg-yellow-300 transition">
                    Sign Up
                </a>
            @endauth

        </div>
    </div>
</nav>

<!-- Flash Message -->
<div class="max-w-7xl mx-auto px-6 mt-5">
    @if(session('success'))
        <div class="bg-[#1a1a1a] border border-[#ffaa00] text-[#ffaa00] px-4 py-3 rounded-lg flex justify-between items-center mb-5">
            <span>✅ {{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="text-zinc-400 hover:text-white text-xl font-bold">&times;</button>
        </div>
    @endif

    @yield('content')
</div>

<!-- Footer -->
<footer class="bg-black border-t border-zinc-800 text-center py-8 mt-16">
    <p class="brand-font text-[#ffaa00] text-2xl tracking-widest mb-1">THREADSHOP</p>
    <p class="text-zinc-500 text-sm">&copy; {{ date('Y') }} ThreadShop. All rights reserved.</p>
</footer>

</body>
</html>