<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThreadShop – Clothing Marketplace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#ffaa00',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Barlow', sans-serif; }
        .brand-font { font-family: 'Bebas Neue', sans-serif; }
        .card-hover { transition: transform 0.2s ease, border-color 0.2s ease; }
        .card-hover:hover { transform: translateY(-5px); border-color: #ffaa00 !important; }
    </style>
</head>
<body class="bg-[#111111] text-white min-h-screen">

<!-- Navbar -->
<nav class="bg-black border-b-2 border-[#ffaa00] sticky top-0 z-50 shadow-xl">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}"
           class="brand-font text-[#ffaa00] text-4xl tracking-widest hover:text-yellow-300 transition">
            👕 THREADSHOP
        </a>
        <div class="flex items-center gap-3">
            <a href="{{ route('products.create') }}"
               class="bg-[#ffaa00] text-black font-bold text-sm px-5 py-2 rounded-lg hover:bg-yellow-300 transition">
                + Add Product
            </a>
            <a href="{{ route('cart.index') }}"
               class="border-2 border-[#ffaa00] text-[#ffaa00] font-bold text-sm px-5 py-2 rounded-lg hover:bg-[#ffaa00] hover:text-black transition">
                🛒 Cart ({{ count(session()->get('cart', [])) }})
            </a>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="max-w-7xl mx-auto px-6 mt-6">
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