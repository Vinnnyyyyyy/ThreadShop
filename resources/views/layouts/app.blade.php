<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThreadShop – Clothing Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #ff8c00;
            --dark: #111111;
            --card-bg: #1a1a1a;
            --text: #ffffff;
            --muted: #aaaaaa;
        }

        body {
            background: var(--dark);
            color: var(--text);
            font-family: 'Oswald', sans-serif;
        }

        /* Navbar */
        .navbar {
            background: #000 !important;
            border-bottom: 2px solid var(--primary);
        }
        .navbar-brand {
            color: var(--primary) !important;
            font-weight: 900;
            font-size: 1.8rem;
            letter-spacing: 2px;
        }

        /* Cards */
        .card {
            background: var(--card-bg);
            border: 1px solid #333;
            border-radius: 10px;
            transition: transform 0.2s, border-color 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }
        .card-body { color: var(--text); }
        .card-footer {
            background: #222;
            border-top: 1px solid #333;
        }

        /* Buttons */
        .btn-primary, .btn-dark {
            background: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #000 !important;
            font-weight: 700;
        }
        .btn-primary:hover, .btn-dark:hover {
            background: #cc5200 !important;
        }
        .btn-warning {
            background: var(--primary);
            border-color: var(--primary);
            color: #000;
            font-weight: 700;
        }
        .btn-outline-dark {
            border-color: var(--primary) !important;
            color: var(--primary) !important;
        }
        .btn-outline-dark:hover {
            background: var(--primary) !important;
            color: #000 !important;
        }

        /* Form controls */
        .form-control, .form-select {
            background: #222;
            border: 1px solid #444;
            color: var(--text);
        }
        .form-control:focus, .form-select:focus {
            background: #222;
            border-color: var(--primary);
            color: var(--text);
            box-shadow: 0 0 0 0.2rem rgba(255,102,0,0.25);
        }
        .form-select option { background: #222; }

        /* Text */
        .text-muted { color: var(--muted) !important; }
        .text-success { color: var(--primary) !important; }

        /* Alert */
        .alert-success {
            background: #1a1a1a;
            border: 1px solid var(--primary);
            color: var(--primary);
        }

        /* Table (cart) */
        .table {
            color: var(--text);
            background: var(--card-bg);
        }
        .table-dark { background: #000; }
        .table-bordered td, .table-bordered th {
            border-color: #333;
        }

        /* Badge */
        .badge.bg-secondary {
            background: var(--primary) !important;
            color: #000;
        }

        /* Footer */
        footer {
            background: #000;
            border-top: 2px solid var(--primary);
            color: var(--muted);
        }

        /* Pagination */
        .pagination .page-link {
            background: #222;
            border-color: #444;
            color: var(--primary);
        }
        .pagination .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
            color: #000;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg mb-4 shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">👕 THREADSHOP</a>
        <div class="d-flex gap-2">
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">+ Add Product</a>
            <a href="{{ route('cart.index') }}" class="btn btn-warning btn-sm">
                🛒 Cart ({{ count(session()->get('cart', [])) }})
            </a>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<footer class="text-center py-4 mt-5">
    <p class="mb-0">&copy; {{ date('Y') }} ThreadShop. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>