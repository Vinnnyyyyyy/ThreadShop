@extends('layouts.app')

@section('content')

<h2 class="mb-3">All Clothing</h2>

{{-- Search & Filter --}}
<form method="GET" action="{{ route('home') }}" class="row g-2 mb-4">
    <div class="col-md-6">
        <input type="text" name="search" class="form-control"
               placeholder="Search by name..." value="{{ request('search') }}">
    </div>
    <div class="col-md-3">
        <select name="category" class="form-select">
            <option value="">All Categories</option>
            <option value="Men"   {{ request('category') == 'Men'   ? 'selected' : '' }}>Men</option>
            <option value="Women" {{ request('category') == 'Women' ? 'selected' : '' }}>Women</option>
            <option value="Kids"  {{ request('category') == 'Kids'  ? 'selected' : '' }}>Kids</option>
            <option value="Unisex"{{ request('category') == 'Unisex'? 'selected' : '' }}>Unisex</option>
        </select>
    </div>
    <div class="col-md-3">
        <button type="submit" class="btn btn-dark w-100">Filter</button>
    </div>
</form>

{{-- Product Grid --}}
@if($products->isEmpty())
    <p class="text-muted">No products found.</p>
@else
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($products as $product)
    <div class="col">
        <div class="card h-100 shadow-sm">
            {{-- Product Image --}}
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="card-img-top" alt="{{ $product->name }}">
            @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center">
                    <span class="text-muted fs-1">👕</span>
                </div>
            @endif

            <div class="card-body">
                <span class="badge bg-secondary badge-category mb-1">{{ $product->category }}</span>
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="text-muted small">Size: {{ $product->size }}</p>
                <p class="fw-bold text-success fs-5">₱{{ number_format($product->price, 2) }}</p>
                <p class="text-muted small">Stock: {{ $product->stock }}</p>
            </div>

            <div class="card-footer d-flex gap-2">
                <a href="{{ route('products.show', $product) }}" class="btn btn-outline-dark btn-sm flex-fill">View</a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-primary btn-sm flex-fill">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST"
                      onsubmit="return confirm('Delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm">Del</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-4">{{ $products->links() }}</div>
@endif

@endsection