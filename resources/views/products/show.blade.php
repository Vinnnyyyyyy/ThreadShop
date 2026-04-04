@extends('layouts.app')

@section('content')

<a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm mb-3">← Back</a>

<div class="row">
    <div class="col-md-5">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                 class="img-fluid rounded shadow" alt="{{ $product->name }}">
        @else
            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                 style="height:300px; font-size:5rem;">👕</div>
        @endif
    </div>

    <div class="col-md-7">
        <span class="badge bg-secondary mb-2">{{ $product->category }}</span>
        <h2>{{ $product->name }}</h2>
        <p class="text-muted">Size: <strong>{{ $product->size }}</strong></p>
        <h3 class="text-success">₱{{ number_format($product->price, 2) }}</h3>
        <p>{{ $product->description }}</p>
        <p class="text-muted">Available Stock: {{ $product->stock }}</p>

        {{-- Add to Cart --}}
        @if($product->stock > 0)
            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf
                <button class="btn btn-warning btn-lg">🛒 Add to Cart</button>
            </form>
        @else
            <button class="btn btn-secondary btn-lg" disabled>Out of Stock</button>
        @endif

        <div class="mt-3 d-flex gap-2">
            <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-primary">Edit</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST"
                  onsubmit="return confirm('Delete this product?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
    </div>
</div>

@endsection