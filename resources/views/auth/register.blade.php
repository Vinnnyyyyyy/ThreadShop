<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up – ThreadShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Barlow', sans-serif; }
        .brand-font { font-family: 'Bebas Neue', sans-serif; }
    </style>
</head>
<body class="bg-[#111111] text-white min-h-screen flex items-center justify-center">

<div class="w-full max-w-md px-6 py-10">

    {{-- Logo --}}
    <div class="text-center mb-8">
        <a href="/" class="flex items-center justify-center gap-3 hover:opacity-80 transition">
            <img src="/images/logo.png" alt="ThreadShop Logo" class="h-14 w-14 rounded-full">
            <span class="brand-font text-[#ffaa00] text-5xl tracking-widest">THREADSHOP</span>
        </a>
        <p class="text-zinc-400 mt-2">Create your account to start shopping.</p>
    </div>

    {{-- Card --}}
    <div class="bg-[#1a1a1a] border border-zinc-800 rounded-xl p-8">

        <h2 class="brand-font text-3xl text-[#ffaa00] tracking-widest mb-6">SIGN UP</h2>

        {{-- Errors --}}
        @if($errors->any())
            <div class="bg-red-900 border border-red-700 text-red-300 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-zinc-300 font-semibold mb-1">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full bg-[#111111] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00] @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-zinc-300 font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full bg-[#111111] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00] @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-zinc-300 font-semibold mb-1">Password</label>
                <input type="password" name="password" required
                       class="w-full bg-[#111111] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00] @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">
                <label class="block text-zinc-300 font-semibold mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" required
                       class="w-full bg-[#111111] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00]">
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full bg-[#ffaa00] text-black font-black text-lg py-3 rounded-lg hover:bg-yellow-300 transition">
                Create Account
            </button>
        </form>

        {{-- Login Link --}}
        <p class="text-center text-zinc-400 text-sm mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-[#ffaa00] font-bold hover:text-yellow-300 transition">
                Login
            </a>
        </p>

    </div>
</div>

</body>
</html>