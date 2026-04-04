<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThreadShop – Clothing Marketplace</title>
    <!-- Bootstrap CSS (no build step needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .navbar-brand { font-weight: 700; font-size: 1.5rem; }
        .card-img-top { height: 220px; object-fit: cover; }
        .badge-category { font-size: 0.75rem; }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">👕 ThreadShop</a>
        <div class="d-flex gap-2">
            <a href="{{ route('products.create') }}" class="btn btn-outline-light btn-sm">+ Add Product</a>
            <a href="{{ route('cart.index') }}" class="btn btn-warning btn-sm">
                🛒 Cart ({{ count(session()->get('cart', [])) }})
            </a>
        </div>
    </div>
</nav>

<div class="container">
    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<footer class="text-center text-muted py-4 mt-5 border-top">
    &copy; {{ date('Y') }} ThreadShop. All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>