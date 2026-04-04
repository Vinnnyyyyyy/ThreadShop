@extends('layouts.app')

@section('content')

<h2 class="mb-4">🛒 Your Cart</h2>

@if(empty($cart))
    <div class="text-center py-5">
        <p class="fs-4 text-muted">Your cart is empty.</p>
        <a href="{{ route('home') }}" class="btn btn-dark">Continue Shopping</a>
    </div>
@else
    <div class="table-responsive">
        <table class="table table-bordered align-middle bg-white shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp

                @foreach($cart as $id => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @if($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}"
                                         style="width:60px; height:60px; object-fit:cover;" class="rounded">
                                @else
                                    <span class="fs-3">👕</span>
                                @endif
                                {{ $item['name'] }}
                            </div>
                        </td>
                        <td>₱{{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>₱{{ number_format($subtotal, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Total:</td>
                    <td class="fw-bold text-success fs-5" colspan="2">₱{{ number_format($total, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="d-flex gap-2 mt-3">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">← Continue Shopping</a>
        <button class="btn btn-success">Checkout (coming soon)</button>
    </div>
@endif

@endsection